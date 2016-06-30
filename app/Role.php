<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
class Role extends EntrustRole
{

    /**
     * belongs to many for admin_user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    protected $guarded = [];



}
