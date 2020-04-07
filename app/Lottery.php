<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lottery extends Model
{
    protected $table = 'lotteries';

    protected $fillable = [
        'name', 'image','status','percent','payment_x'
    ];

    public function schedules(){
        return $this->belongsToMany(Schedule::class,"schedules_setting","lottery_id","schedule_id")->withTimestamps();
    }
    public function type_games(){
        return $this->belongsToMany(Type_game::class,"box","lottery_id","type_game_id")->withTimestamps();
    }
    public function plays(){
        return $this->hasMany(Play::class);
    }

    /* public function agencies(){
        return $this->hasMany(Agency::class);
    } */
     public function agencies_lotteries(){
        return $this->belongsToMany(Agency::class,"agency_lottery","lottery_id","agency_id")->withTimestamps();
    }
}
