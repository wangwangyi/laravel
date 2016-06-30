<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use Cache;
use Validator;
class CategoryController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('role:admin');
    }
    private function messages()
    {
        return [
            'name.required' => '分类名称不能为空！',
        ];
    }

    function index()
    {
        $categories = Category::get_categories();
        //return $categories;
        $count = count(Category::get());
        Category::clear();
        return view('admin.category.index')->with('categories', $categories)
                                               ->with('count',$count);
    }


    public function create()
    {
        $categories = Category::get_categories();
        return view('admin.category.create')->with('categories',$categories);
    }

    //新增
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $this->messages());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Category::create($request->all());
        Category::clear();
        return redirect(route('admin.category.index'))->with('msg', '添加栏目成功');
    }

    //修改
    public function edit($id)
    {
        $cate = Category::find($id);
       // return $category;
        $categories = Category::get_categories();
        Category::clear();
        return view('admin.category.edit')->with('cate',$cate)
                                             ->with('categories',$categories);
    }

    //更新
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update($request->all());
       // return $category;
        Category::clear();
        return redirect(route('admin.category.index'))->with('msg', '编辑成功~');
    }

    //删除
    public function destroy($id)
    {
        if (!Category::check_children($id)) {
            return back()->with('error', '当前分类有子分类，请先将子分类删除后再尝试删除~');
        }
        Category::destroy($id);
        Category::clear();
        return back()->with('msg', '删除成功');
    }
}
