<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    protected $table = 'customers';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'firstname', 'lastname','identity_card','phone','address'
    ];

    public function ticket_offices(){
        return $this->belongsToMany(Ticket_office::class)->withTimestamps();
    }
}
