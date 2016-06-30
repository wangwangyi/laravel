<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Article;
class TrashController extends CommonController
{
    public function index(Request $request)
    {
        //多条件查找
        $where = function ($query) use ($request) {
            if ($request->has('name') and $request->name != '') {
                $search = "%" . $request->name . "%";
                $query->where('name', 'like', $search);
            }

            if ($request->has('created_at') and $request->created_at != '') {
                $time = explode(" ~ ", $request->input('created_at'));
                foreach ($time as $k => $v) {
                    $time["$k"] = $k == 0 ? $v . " 00:00:00" : $v . " 23:59:59";
                }
                $query->whereBetween('created_at', $time);
            }
        };

        $articles = Article::onlyTrashed()->with('category','user')->paginate(15);
        //return $articles;
        $count = count($articles);
        return view('admin.trash.index')->with('articles',$articles)
            ->with('count',$count);
    }

    //还原
    public function restore($id)
    {
        Article::onlyTrashed()->where('id', $id)->restore();
        return redirect('admin/trash')->with('msg', '还原成功！');
    }
    //强制删除
    public function forceDelete($id)
    {
        Article::onlyTrashed()->where('id', $id)->forceDelete();
        return redirect('admin/trash')->with('msg', '删除成功！');
    }

    //回收站全选删除

    public function select_del(Request $request)
    {
        $select_id = $request->select_id;
        foreach($select_id as $v){
            $article = Article::onlyTrashed()->find($v);
            $article->forceDelete();
        }
    }

    //回收站全选还原
    public function select_restore(Request $request)
    {
        $select_id = $request->select_id;
        foreach($select_id as $v){
            $article = Article::onlyTrashed()->find($v);
            $article->restore();
        }
    }

}
