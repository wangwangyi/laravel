<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
class SearchController extends CommonController
{
    public function search(Request $request)
    {
        $keyword = "%".$request->keyword."%";
        $articles = Article::where("name","like",$keyword)->paginate(1);
        $count = count(Article::where("name","like",$keyword)->get());
        //return $articles;
        $title = $request->keyword;
        return view('home.search')->with('articles',$articles)
                                    ->with('title',$title)
                                    ->with('count',$count);
    }
}
