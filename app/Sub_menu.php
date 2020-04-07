<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sub_menu extends Model
{
    protected $table = 'sub_menus';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function roles(){
        return $this->belongsToMany(User::class,"role_sub_menu","sub_menu_id","role_id")->withTimestamps();
    }
    public function menus(){
        return $this->belongsTo(Menu::class)->withTimestamps();
    }
}
