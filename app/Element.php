<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Element extends Model
{
    protected $table = 'elements';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
     protected $fillable = [
        'code','description', 'type_game_id','image',
    ];

    public function type_game(){
        return $this->belongsTo(Type_game::class);
    }
}
