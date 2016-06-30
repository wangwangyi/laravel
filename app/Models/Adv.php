<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adv extends Model
{
    protected $guarded = [];
    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }
}
