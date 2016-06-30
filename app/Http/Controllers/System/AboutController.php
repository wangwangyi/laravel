<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\About;
class AboutController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_about' => 'am-in']);
    }

    public function index($id)
    {
        $about = About::find($id);
        return view('admin.about.index')->with('about',$about);
    }

    //更新
    public function update(Request $request, $id)
    {
        $about = About::find($id);
        $about->update($request->all());
        return back();
    }
}
