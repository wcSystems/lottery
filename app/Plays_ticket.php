<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plays_ticket extends Model
{
    protected $table = 'plays_ticket';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
