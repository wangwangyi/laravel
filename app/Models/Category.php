<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
class Category extends Model
{
    protected $guarded = [];

    static function get_categories()
    {
        $categories = Cache::rememberForever('System_category_categories', function () {
            return self::with(['children' =>function($query){
                $query->orderBy('sort_order');
            }])->where('parent_id',0)->orderBy('sort_order')->get();
        });
        return $categories;
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category','parent_id','id');
    }

    static function clear()
    {
        Cache::forget('System_category_categories');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    /**
     * 检查是否有子栏目
     */
    static function check_children($id)
    {
        $category = self::with('children')->find($id);
        if ($category->children->isEmpty()) {
            return true;
        }
        return false;
    }


    /**
     * 筛选分类时,屏蔽掉没有内容的分类
     */
    static function filter_categories()
    {
        $categories = self::has('children.articles')->with(['children' => function ($query) {
            $query->has('articles');
        }])->get();
        return $categories;
    }
}
