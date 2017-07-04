<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Traits\Admin\ActionButtonTrait;
class AdminUser extends Model implements Transformable
{
    use TransformableTrait;
    use EntrustUserTrait;
    use ActionButtonTrait;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at'
    ];

}
