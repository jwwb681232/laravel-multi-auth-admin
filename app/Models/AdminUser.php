<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class AdminUser extends Model implements Transformable
{
    use TransformableTrait;
    use EntrustUserTrait;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'created_at',
        'updated_at'
    ];

}
