<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;
use Validator,Session, Captcha;
class ListController extends CommonController
{
    public function index(Request $request,$id)
    {
        //筛选
        $where = function ($query) use ($request) {
            if($request->has('address')){
                $query->where('address',$request->address);
            }
            if($request->has('investment')){
                $query->where('investment',$request->investment);
            }
            if($request->has('join')){
                $query->where('join',$request->join);
            }
        };
        $title = Category::where("id","=",$id)->find($id);//title
        $address = Article::groupBy('address')->take(12)->lists('address');//查询地区，排除重复
        $investment = Article::groupBy('investment')->take(12)->lists('investment');//查询投资金额，排除重复

        $join = Article::groupBy('join')->take(12)->lists('join');
        $lists = Article::with('category')->where("c_id",$id)->where($where)->get();//列表
        foreach ($lists as $c){
            $c['count'] = Comment::where("article_id",$c['id'])->count();//查询对应留言个数
        }
        $children_list = Article::where("category_id",$id)->get();

        foreach ($children_list as $c){
            $c['count'] = Comment::where("article_id",$c['id'])->count();
        }

        $best = Article::where("is_top",1)->take(40)->get();
        return view('home.list.index')->with('lists',$lists)
                                         ->with('title',$title)
                                         ->with('address',$address)
                                         ->with('investment',$investment)
                                         ->with('children_list',$children_list)
                                         ->with('best',$best)
                                         ->with('join',$join);
    }

    public function mews() {
        return Captcha::create('flat');
    }

    public function check(Request $request)
    {
        $result = [];
        $rules = [
            "code" => 'required|captcha'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            $result['status'] = 0;
            $result['info'] = "验证错误！";
        } else {
            $result['status'] = 1;
            $result['info'] = "";
        }
        return $result;
    }

    public function store(Request $request)
    {
        $data = $request->except([ 'code']);
        Comment::create($data);
        return back();
    }


}
