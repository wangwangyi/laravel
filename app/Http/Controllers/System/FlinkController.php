<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Flink;
class FlinkController extends CommonController
{
    public function index()
    {
        $flinks = Flink::paginate(15);
        $count = count(Flink::get());
        return view('admin.flink.index')->with('flinks',$flinks)
                                           ->with('count',$count);
    }

    public function create()
    {
        return view('admin.flink.create');
    }

    public function store(Request $request)
    {
        Flink::create($request->all());
        return redirect(route('admin.flink.index'))->with('msg', '添加友情链接成功');
    }

    function update_url(Request $request)
    {
        $flink = Flink::find($request->id);
        $flink->update(['url' => $request->url]);
    }
    function update_name(Request $request)
    {
        $flink = Flink::find($request->id);
        $flink->update(['name' => $request->name]);
    }

    //删除
    public function delete(Request $request)
    {
        Flink::destroy($request->flink_id);
    }
}
