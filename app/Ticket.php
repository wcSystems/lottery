<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    protected $table = 'tickets';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'code','description', 'vat','subtotal','total','ticket_office_id','customer_id'
    ];

    public function plays(){
        return $this->belongsToMany(Play::class)->withTimestamps();
    }
}
