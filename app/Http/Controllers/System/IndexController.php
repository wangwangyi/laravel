<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends CommonController
{
    public function index(Request $request)
    {
        /*$value = $request->session()->all();
        return $value;*/
        return view('admin.index.index');
    }



}

