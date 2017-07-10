<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use App\Traits\Admin\ActionButtonTrait;
class Role extends EntrustRole
{
    use ActionButtonTrait;
    protected $fillable = [
        'display_name',
        'name',
        'description'
    ];

    public function admins ()
    {
        // 多对多的关系（一个角色赋予了多个用户）
        return $this->belongsToMany(Admin::class,'admins','id');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class,'permission_role');
    }
}