<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Traits\Admin\ActionButtonTrait;

class Menu extends Model implements Transformable
{
    use TransformableTrait;
    use ActionButtonTrait;
    protected $fillable = [
        'name',
        'icon',
        'slug',
        'parent_id',
        'url',
        'heightlight_url',
        'sort'
    ];

}
