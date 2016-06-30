<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\About;
class AboutController extends CommonController
{
    public function index($id)
    {
        $about = About::find($id);
        $abouts = About::get();
        //return $about;
        return view('home.about.index')->with('about',$about)
                                          ->with('abouts',$abouts);
    }
}
