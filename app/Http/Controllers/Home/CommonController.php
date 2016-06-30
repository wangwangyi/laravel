<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Article;
use App\Models\Flink;
use App\Models\Adv;
use App\Models\System;
class CommonController extends Controller
{
    function __construct()
    {
        $cates = Category::where("parent_id","=",0)->paginate(12);//导航栏
        $brands = Article::where("is_recommend",1)->paginate(36);
        $clothing = Category::where("parent_id",11)->paginate(8);//服装
        $catering = Category::where("parent_id",19)->paginate(10);//餐饮
        $cosmetology = Category::where("parent_id",23)->paginate(8);//美容
        $home = Category::where("parent_id",20)->paginate(8);//居家
        $teach = Category::where("parent_id",22)->paginate(6);//教育
        $news = Category::where("parent_id",28)->paginate(8);//新锐
        $flinks = Flink::take(50)->get();
        $advs = Adv::where("place_id",10)->take(4)->get();//金牌推荐
        $adv_right = Adv::where("place_id",11)->take(3)->get();//搜索右侧
        $system = System::find(1);
        view()->share([
            'cates' => $cates,
            'brands' => $brands,
            'clothing' => $clothing,
            'catering' =>$catering,
            'cosmetology' => $cosmetology,
            'home' => $home,
            'teach' => $teach,
            'news' => $news,
            'flinks' => $flinks,
            'advs' => $advs,
            'adv_right' => $adv_right,
            'system' => $system,
        ]);

    }

}
