<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    protected $table = 'schedules';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function lotteries(){
        return $this->belongsToMany(Lottery::class,"schedules_setting","schedule_id","lottery_id")->withTimestamps();
    }
}
