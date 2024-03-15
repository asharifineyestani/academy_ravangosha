<?php

namespace Afranext\Crud\app\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $fillable = [
        'name',
        'href',
        'icon',
        'parent_id',
        'group',
        'order',
        'permission',
    ];
}
