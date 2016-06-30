<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cache;
use Hootlex\Moderation\Moderatable;
class Article extends Model
{
    use SoftDeletes;
    use Moderatable;//审核
    //设置表名
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function galleries()
    {
        return $this->hasMany('App\Models\Gallery');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }


    //缓存
    static function get_lists()
    {
        $lists = Cache::rememberForever('home_list_lists', function () {
            return self::take(138)->get();
        });
        return $lists;
    }
    //清除缓存
    static function clear()
    {
        Cache::forget('home_list_lists');
    }
    /**
     * 检查是否有留言
     */
    static function check_comments($id)
    {
        $article = self::with('comments')->find($id);
        if ($article->comments->isEmpty()) {
            return true;
        }
        return false;
    }
}
