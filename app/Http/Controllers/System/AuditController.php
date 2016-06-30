<?php

namespace App\Http\Controllers\System;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Article;
use App\Models\Email;
class AuditController extends CommonController
{
    //查询待审核内容
    public function audit()
    {
        $articles = Article::pending()->get();
        return view('admin.audit.audit')->with('articles',$articles);
    }

    //查询审核未通过内容
    public function stop_list()
    {
        $articles = Article::rejected()->get();//未通过
        return view('admin.audit.stop_list')->with('articles',$articles);
    }

    public function show($id)
    {
        $article = Article::pending()->find($id);
        return view('admin.audit.show')->with('article',$article);
    }

    //进行审核，通过
    public function pass($id)
    {
        Article::approve($id);
        return back();
    }

    //进行审核，未通过
        public function stop($id)
    {
        $article = Article::pending()->find($id);
        //return $article;
        Article::reject($id);
        //未通过原因
        Email::create([
            'content' => "你填写内容未通过审核，请重新修改，谢谢！",
            'article_id' => $id,
            'user_id' => $article->user_id,

        ]);
        return back();
    }

    //邮件
    public function info()
    {
        $admin = \Auth::user();
        $info = Email::where("user_id",$admin->id)->with('article')->get();
        return view('admin.info')->with('info',$info);
    }
    //删除邮件
    public function delete(Request $request)
    {
        Email::destroy($request->email_id);
    }

    //回复邮件
    public function store(Request $request)
    {
        Email::create($request->all());
        return back();
    }
}
