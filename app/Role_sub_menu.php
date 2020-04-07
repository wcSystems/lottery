<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role_sub_menu extends Model
{
    protected $table = 'role_sub_menu';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
