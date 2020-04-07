<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Password_reset extends Model
{
    protected $table = 'password_resets';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
