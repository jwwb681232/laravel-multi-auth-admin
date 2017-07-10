<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;
use App\Traits\Admin\ActionButtonTrait;
class Permission extends EntrustPermission
{
    use ActionButtonTrait;
    protected $fillable = [
        'display_name',
        'name',
        'description'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'roles');
    }
}