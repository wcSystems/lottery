<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedules_setting extends Model
{
    protected $table = 'schedules_setting';

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
