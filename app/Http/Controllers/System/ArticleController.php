<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use Validator;
use Cache;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Article;
use App\Models\Gallery;
use App\User;
class ArticleController extends CommonController
{
    //验证
    private function messages()
    {
        return [
            'name.required' => '.商店名称不能为空！',
            'category_id.required' =>'.分类名称不能为空！',
        ];
    }

    private function attributes()
    {
        view()->share([
            'filter_categories' => Category::filter_categories()
        ]);
    }

    public function index(Request $request)
    {
        $this->attributes();
        //多条件查找
        $where = function ($query) use ($request) {
            if ($request->has('name') and $request->name != '') {
                $search = "%" . $request->name . "%";
                $query->where('name', 'like', $search);
            }

            if ($request->has('category_id') and $request->category_id != '-1') {
                $query->where('category_id', $request->category_id);
            }

            if ($request->has('is_onsale') and $request->is_onsale != '-1') {
                $query->where('is_onsale', $request->is_onsale);
            }

            if ($request->has('is_top')) {
                $query->where('is_top', true);
            }

            if ($request->has('is_recommend')) {
                $query->where('is_recommend', true);
            }
            if ($request->has('is_hot')) {
                $query->where('is_hot', true);
            }
            if ($request->has('is_new')) {
                $query->where('is_new', true);
            }

            if ($request->has('created_at') and $request->created_at != '') {
                $time = explode(" ~ ", $request->input('created_at'));
                foreach ($time as $k => $v) {
                    $time["$k"] = $k == 0 ? $v . " 00:00:00" : $v . " 23:59:59";
                }
                $query->whereBetween('created_at', $time);
            }
        };
        $articles = Article::with('category','user')->where($where)->paginate(15);
        $count = count(Article::get());
        return view('admin.article.index')->with('articles',$articles)
                                             ->with('count',$count);
    }


    //用户组
    public function consumer()
    {
        $user = \Auth::user();
        foreach ($user as $v){
               $id = $user['id'];
        }
        //return $id;
        $articles = Article::with('user','category')->where("user_id","=",$id)->get();
       // return $articles;
        return view('admin.article.consumer')->with('articles',$articles);
    }
    public function show($id)
    {
        $dir = dirname(getcwd()).'/public/templates';//获取文件夹路径
        $types = listDir($dir);//遍历
        $article = Article::with('galleries')->find($id);
        //return $article;
        $categories = Category::get_categories();
        Category::clear();
        return view('admin.article.show')->with('categories',$categories)
                                            ->with('article',$article)
                                            ->with('types',$types);
    }
    //修改
    public function consumer_update(Request $request,$id)
    {
        $data = $request->except([ 'file', 'imgs','markdown_html_code']);
        //各种is...属性赋值
        $attrs = ['is_top', 'is_recommend', 'is_hot', 'is_new'];
        foreach ($attrs as $attr) {
            $data["$attr"] = $request->has($attr) ? $request->$attr : '';
        }

        $article = Article::find($id);
        $article->update($data);

        //相册
        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $article->galleries()->create(['imgs' => $img]);
            }
        }

        return redirect('admin/article/consumer')->with('msg', '修改成功~');
    }

    //上架 热销 新品 精品 ajax选择
    public function is_something(Request $request)
    {
        $attr = $request->attr;
        $article = Article::find($request->id);
        $value = $article->$attr ? false : true;
        $article->$attr = $value;
        $article->save();
    }

    public function create()
    {
        $dir = dirname(getcwd()).'/public/templates';//获取文件夹路径
        $types = listDir($dir);//遍历
        //return $types;
        $categories = Category::get_categories();
        $users = User::get();
        Category::clear();
        //return $categories;
        return view('admin.article.create')->with('categories',$categories)
                                               ->with('users',$users)
                                               ->with('types',$types);
    }

    //新增
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = $request->except([ 'file', 'imgs','markdown_html_code']);
        $article = Article::create($data);
       // return $article;

        //相册
        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $article->galleries()->create(['imgs' => $img]);
            }
        }
        return redirect(route('admin.article.index'))->with('msg', '添加成功！');
    }

    public function edit($id)
    {
        $dir = dirname(getcwd()).'/public/templates';//获取文件夹路径
        $types = listDir($dir);//遍历
        $article = Article::with('galleries')->find($id);
        //return $article;
        $categories = Category::get_categories();
        $users = User::get();
        Category::clear();
        return view('admin.article.edit')->with('categories',$categories)
                                            ->with('article',$article)
                                            ->with('users',$users)
                                            ->with('types',$types);
    }
    //修改
    public function update(Request $request,$id)
    {
        $data = $request->except([ 'file', 'imgs','markdown_html_code']);
        //各种is...属性赋值
        $attrs = ['is_top', 'is_recommend', 'is_hot', 'is_new'];
        foreach ($attrs as $attr) {
            $data["$attr"] = $request->has($attr) ? $request->$attr : '';
        }
        $article = Article::find($id);
        $article->update($data);
        //相册
        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $article->galleries()->create(['imgs' => $img]);
            }
        }

        return redirect(route('admin.article.index'))->with('msg', '修改成功~');
    }

    //ajax删除相册图片
    public function destroy_gallery(Request $request)
    {
        Gallery::destroy($request->gallery_id);
    }

    //删除内容
    public function destroy($id)
    {
        if (!Article::check_comments($id)) {
            return back()->with('msg', '当前内容有留言，请先将留言删除后再尝试删除~');
        }
        Article::destroy($id);
        return back()->with('msg', '删除成功');
    }

    /**
     * 多选删除
     * @param Request $request
     */
    function destroy_checked(Request $request)
    {
        $checked_id = $request->input("checked_id");
        $delete_id = [];

        foreach ($checked_id as $id) {
            $delete_id[] = $id;
        }
        Article::destroy($delete_id);
    }
}
