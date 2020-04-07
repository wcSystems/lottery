<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model
{
    protected $table = 'agencies';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'rif','percentage_profit','address','phone'
    ];

    public function ticket_offices(){
        return $this->hasMany(Ticket_office::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function lotteries(){
        return $this->hasMany(Lottery::class);
    }
    public function lotteries_agencys(){
        return $this->belongsToMany(Lottery::class,"agency_lottery","agency_id","lottery_id")->withTimestamps();
    }
}
