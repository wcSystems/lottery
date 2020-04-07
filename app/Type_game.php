<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type_game extends Model
{
    protected $table = 'type_games';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function lotteries(){
        return $this->belongsToMany(Lottery::class,"box","type_game_id","lottery_id")->withTimestamps();
    }
    public function elements(){
        return $this->hasMany(Element::class);
    }
}
