<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Play extends Model
{
    protected $table = 'plays';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function tickets(){
        return $this->belongsToMany(Ticket::class)->withTimestamps();
    }
    public function lotteries(){
        return $this->belongsTo(Lottery::class);
    }
}
