<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Box extends Model
{
    protected $table = 'box';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
