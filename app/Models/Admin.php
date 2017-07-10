<?php

namespace App\Models;

use App\Models\User;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class Admin extends User
{
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'role_admin','user_id');
    }
}
