<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency_lottery extends Model
{
    protected $table = 'agency_lottery';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
