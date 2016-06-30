<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Comment;
class CommentController extends CommonController
{

    public function all_comment(Request $request)
    {
        //多条件查找
        $where = function ($query) use ($request) {
            if ($request->has('username') and $request->username != '') {
                $search = "%" . $request->username . "%";
                $query->where('username', 'like', $search);
            }

            if ($request->has('tel') and $request->tel != '') {
                $query->where('tel', $request->tel);
            }

            if ($request->has('qq') and $request->qq != '') {
                $query->where('qq', $request->qq);
            }

            if ($request->has('created_at') and $request->created_at != '') {
                $time = explode(" ~ ", $request->input('created_at'));
                foreach ($time as $k => $v) {
                    $time["$k"] = $k == 0 ? $v . " 00:00:00" : $v . " 23:59:59";
                }
                $query->whereBetween('created_at', $time);
            }
        };
        $comments = Comment::with('article')->where($where)->paginate(15);

        $del_comments = Comment::onlyTrashed()->where($where)->paginate(15);
        //return $comments;
        $count = count(Comment::get());
        return view('admin.comment.all_comment')->with('comments',$comments)
                                                    ->with('count',$count)
                                                    ->with('del_comments',$del_comments);
    }
    //强制删除
    public function forceDelete(Request $request)
    {
        Comment::onlyTrashed()->where('id', $request->comment_id)->forceDelete();
        //return redirect('admin/comment/all_comment')->with('msg', '删除成功！');
    }


    //查看留言
    public function del_show($id)
    {
        $comment = Comment::onlyTrashed()->find($id);
        //return $comment;
        return view('admin.comment.del_show')->with('comment',$comment);
    }

    public function index(Request $request)
    {
        //多条件查找
        $where = function ($query) use ($request) {
            if ($request->has('username') and $request->username != '') {
                $search = "%" . $request->username . "%";
                $query->where('username', 'like', $search);
            }

            if ($request->has('tel') and $request->tel != '') {
                $query->where('tel', $request->tel);
            }

            if ($request->has('qq') and $request->qq != '') {
                $query->where('qq', $request->qq);
            }

            if ($request->has('created_at') and $request->created_at != '') {
                $time = explode(" ~ ", $request->input('created_at'));
                foreach ($time as $k => $v) {
                    $time["$k"] = $k == 0 ? $v . " 00:00:00" : $v . " 23:59:59";
                }
                $query->whereBetween('created_at', $time);
            }
        };
        $user = \Auth::user();
        foreach ($user as $v){
            $article_id = $user['article_id'];
        }
        $comments = Comment::where($where,$article_id)->paginate(15);
        //return $comments;
        $count = count(Comment::get());
        return view('admin.comment.index')->with('comments',$comments)
                                             ->with('count',$count);
    }

    //查看留言
    public function show($id)
    {
        $comment = Comment::find($id);
        return view('admin.comment.show')->with('comment',$comment);
    }

    //删除留言
    public function delete(Request $request)
    {
        Comment::destroy($request->comment_id);
        //return back()->with('msg', '删除成功');
    }

    /**
     * 多选删除
     * @param Request $request
     */
    function destroy_checked(Request $request)
    {
        $checked_id = $request->input("checked_id");
        $delete_id = [];
        //检测商品是否能删除
        foreach ($checked_id as $id) {
            $delete_id[] = $id;
        }
        Comment::destroy($delete_id);
    }
}
