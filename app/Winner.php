<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    protected $table = 'winners';

    public function result(){
        return $this->belongsTo(Result::class);
    }
}
