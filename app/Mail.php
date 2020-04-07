<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    protected $table = 'mails';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
