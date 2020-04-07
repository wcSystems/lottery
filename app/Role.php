<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    protected $table = 'roles';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function sub_menus(){
        return $this->belongsToMany(Sub_menu::class,"role_sub_menu","role_id","sub_menu_id")->withTimestamps();
    }

}
