<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    use SoftDeletes;
    //设置表名
    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function article()
    {
        return $this->belongsTo('App\Models\Article');
    }

}
