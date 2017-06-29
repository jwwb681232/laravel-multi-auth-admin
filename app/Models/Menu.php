<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Menu extends Model implements Transformable
{
    use TransformableTrait;
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
