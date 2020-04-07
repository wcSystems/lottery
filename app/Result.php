<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

    public function winners(){
        return $this->hasMany(Winner::class);
    }
}
