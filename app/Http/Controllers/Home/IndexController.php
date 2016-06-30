<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cache;
use App\Models\Article;
use App\Models\Category;
use App\Models\Adv;
use DB;
use App\Models\Comment;
class IndexController extends CommonController
{
    public function index()
    {
        $b_articles = Article::take(6)->orderBy('created_at','desc')->get();//热门榜单上
        $hot = Article::where("is_hot",1)->take(9)->get();//热门榜单
        $best = Article::get_lists();//中间1
        $bb = Article::take(12)->where("is_hot",1)->get();//热门榜单下
        Article::clear();
        $cate_list = Category::where("parent_id","!=",0)->take(15)->get();
        //return $cate_list;
        foreach ($cate_list as $c){
            $c['list'] = Article::where("category_id",$c['id'])->get();//品牌加盟排行榜
            $c['count'] = Comment::where("article_id",$c['id'])->count();//查询对应留言个数
        }

        $recruit = Article::where("is_hot",1)->orderBy(DB::raw('RAND()'))->take(8)->get();//我要招商
        foreach ($recruit as $c){
            $c['count'] = Comment::where("article_id",$c['id'])->count();//查询对应留言个数
        }

        $onsale = Article::where("is_onsale",1)->take(16)->get();
        //$cen = Article::orderBy('id', 'desc')->take(156)->get();/*中间2*/
        $cen = Cache::rememberForever('cen', function() {
            return Article::orderBy('id', 'desc')->take(156)->get();
        });
        Cache::forget('cen');
        $b_last = Article::where("is_recommend",1)->take(24)->get();/*中间3*/
        $bests = Article::where("is_hot",1)->take(40)->get();//优选
        // return $adv;
        
        $adv1 = Adv::where("place_id",1)->take(4)->orderBy('created_at','desc')->get();//区域一轮播
        $adv2 = Adv::where("place_id",2)->take(4)->orderBy('created_at','desc')->get();//区域二轮播
        $adv22 = Adv::where("place_id",3)->take(1)->orderBy('created_at','desc')->get();//区域二普通
        $adv3 = Adv::where("place_id",4)->take(4)->orderBy('created_at','desc')->get();//区域三轮播
        $adv33 = Adv::where("place_id",5)->take(1)->orderBy('created_at','desc')->get();//区域三普通
        $adv4 = Adv::where("place_id",6)->take(4)->orderBy('created_at','desc')->get();//区域四轮播
        $adv44 = Adv::where("place_id",7)->take(1)->orderBy('created_at','desc')->get();//区域四普通
        $adv5 = Adv::where("place_id",8)->take(4)->orderBy('created_at','desc')->get();//区域五轮播
        $adv55 = Adv::where("place_id",9)->take(1)->orderBy('created_at','desc')->get();//区域五普通
        $adv6 = Adv::where("place_id",12)->take(1)->orderBy('created_at','desc')->get();//头部big
        $adv66 = Adv::where("place_id",13)->take(1)->orderBy('created_at','desc')->get();//头部big

       /* $clothings = Article::where("c_id","=",11)->take(30)->orderBy('created_at','desc')->get();//服装加盟
        foreach ($clothings as $c){
            $c['list'] = Article::where("category_id",$c['id'])->get();//品牌加盟排行榜
        }*/
        $clothings = Article::where("c_id","=",11)->take(30)->get();//服装加盟
        //$foods = Article::where("c_id","=",19)->take(40)->get();//餐饮加盟
        $foods = Category::where("parent_id","=",19)->take(6)->get();//餐饮加盟
        foreach ($foods as $f){
            $f['list'] = Article::where("category_id",$f['id'])->get();
        }
        //return $foods;

        $homes = Article::where("c_id","=",20)->take(30)->get();//居家
        $beauty = Article::where("c_id","=",23)->take(40)->get();//美容
        $car = Article::where("c_id","=",21)->take(30)->get();//汽车
        $new = Article::where("c_id","=",28)->take(30)->get();//新锐
        $shop = Article::where("c_id","=",22)->take(30)->get();//网店
        $protect = Article::where("category_id","=",45)->take(40)->get();//环保
        $food = Category::where("parent_id",26)->paginate(10);//小吃快餐
        return view('home.index.index')->with('b_articles',$b_articles)
                                          ->with('hot',$hot)
                                          ->with('adv1',$adv1)
                                          ->with('adv2',$adv2)
                                          ->with('adv22',$adv22)
                                          ->with('adv3',$adv3)
                                          ->with('adv33',$adv33)
                                          ->with('adv4',$adv4)
                                          ->with('adv44',$adv44)
                                          ->with('adv5',$adv5)
                                          ->with('adv55',$adv55)
                                          ->with('adv6',$adv6)
                                          ->with('adv66',$adv66)
                                          ->with('cate_list',$cate_list)
                                          ->with('clothings',$clothings)
                                          ->with('foods',$foods)
                                          ->with('homes',$homes)
                                          ->with('beauty',$beauty)
                                          ->with('car',$car)
                                          ->with('new',$new)
                                          ->with('protect',$protect)
                                          ->with('best',$best)
                                          ->with('onsale',$onsale)
                                          ->with('cen',$cen)
                                          ->with('b_last',$b_last)
                                          ->with('bests',$bests)
                                          ->with('bb',$bb)
                                          ->with('recruit',$recruit)
                                          ->with('shop',$shop)
                                          ->with('food',$food);
    }
}
