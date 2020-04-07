<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    protected $table = 'menus';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function sub_menus(){
        return $this->hasMany(Sub_menu::class);
    }
}
