<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable = [
        'display_name',
        'name',
        'description'
    ];

    public function admins ()
    {
        // 多对多的关系（一个角色赋予了多个用户）
        return $this->belongsToMany(\App\Models\Admin::class,'admins','id');
    }
}