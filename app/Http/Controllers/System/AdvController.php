<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Adv;
use App\Models\Article;
use App\Models\Place;
class AdvController extends CommonController
{
    public function index()
    {
        $advs =Adv::with('place')->get();
        $count = count($advs);
        //return $advs;
        return view('admin.adv.index')->with('advs',$advs)
                                         ->with('count',$count);
    }

    public function create()
    {
        $places = Place::get();
        $articles = Article::get();
        return view('admin.adv.create')->with('places',$places)
                                          ->with('articles',$articles);
    }

    public function store(Request $request)
    {
        Adv::create($request->all());
        return redirect(route('admin.adv.index'));
    }

    //修改
    public function edit($id)
    {
        $adv = Adv::find($id);
        $places = Place::get();
        $articles = Article::get();
        return view('admin.adv.edit')->with('adv',$adv)
                                       ->with('places',$places)
                                       ->with('articles',$articles);
    }

    //更新
    public function update(Request $request, $id)
    {
        $adv = Adv::find($id);
        $adv->update($request->all());
        return redirect(route('admin.adv.index'))->with('msg', '编辑成功~');
    }

    //删除
    public function delete(Request $request)
    {
        Adv::destroy($request->adv_id);
    }
}
