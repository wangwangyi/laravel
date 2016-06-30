<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Comment;
use DB;
use Cache;
class ProductController extends CommonController
{
    public function show($id)
    {
        $product = Article::find($id);
        $hot_p = Cache::rememberForever('hot', function() {
            return Article::where("is_hot",1)->take(30)->get();
        });
        return view('home.product.index')->with('product',$product)->with('hot_p',$hot_p);
    }

    public function index($id)
    {
        $product = Article::find($id);
        $articles = Article::orderBy(DB::raw('RAND()'))->take(10)->get();
        $product_gallery = Gallery::where("article_id",$id)->get();
        //return $product;
        return view('home.product.content')->with('product',$product)
                                              ->with('product_gallery',$product_gallery)
                                              ->with('articles',$articles);
    }
}
