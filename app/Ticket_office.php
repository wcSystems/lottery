<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket_office extends Model
{
    protected $table = 'ticket_offices';
    use SoftDeletes;
    protected $dates = ['deleted_at',];
    protected $fillable = [
        'descripcion', 'agency_id'
    ];
   
    public function agency(){
        return $this->belongsTo(Agency::class);
    }

    public function customers(){
        return $this->belongsToMany(Customer::class)->withTimestamps();
    }

    public function users(){
        return $this->hasMany(User::class);
    }
}
