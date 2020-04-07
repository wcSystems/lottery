<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    protected $table = 'users';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'firstname', 'lastname', 'password', 'doc', 'profile', 'role_id', 'master'
    ];

    public function agency(){
        return $this->belongsTo(Agency::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    /* public function access(){
        return $this->belongsToMany(Sub_menu::class,"sub_menu_users","user_id","sub_menu_id");
    } */

    public function access_list(){
        $role = Role::find(Auth::user()->role_id);
        $sub_menu = $role->sub_menus()->get();
        $menus = array();
        foreach ($sub_menu as $item) {
            if(!isset($menus[$item->menu_id])){
                $padre = Menu::find($item->menu_id);
                $menus[$padre->id] = array(
                    "name" => $padre->nombre,
                    "icon" => $padre->icon,
                    "hijos" => array()
                );
            }
            $menus[$item->menu_id]["hijos"][] = array(
                "name" => $item->name,
                "url" =>$item->url
            );
        }
        return $menus;
    }

}

