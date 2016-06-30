<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
class MapController extends CommonController
{
    public function index()
    {

        $categories = Category::get_categories();
        $address = Article::groupBy('address')->lists('address');//查询地区，排除重复
        $investment = Article::groupBy('investment')->lists('investment');//查询投资金额，排除重复
        $cates = Category::get();
        $new_article = Article::orderBy('created_at','desc')->take(50)->get();
        $hot_article = Article::where("is_hot",1)->get();
        Category::clear();
        return view('home.map.index')->with('categories',$categories)
                                        ->with('address',$address)
                                        ->with('investment',$investment)
                                        ->with('cates',$cates)
                                        ->with('new_article',$new_article)
                                        ->with('hot_article',$hot_article);
    }
    public function all(Request $request)
    {
        //筛选
        $where = function ($query) use ($request) {
            if($request->has('address')){
                $query->where('address',$request->address);
            }
            if($request->has('investment')){
                $query->where('investment',$request->investment);
            }
        };
        $articles = Article::where($where)->paginate(15);
        return view('home.map.list')->with('articles',$articles);
    }

}
