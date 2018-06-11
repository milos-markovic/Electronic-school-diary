<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users(){
        return $this->hasMany('App\User');
    }
    public function professors(){
        return $this->hasMany('App\Professor');
    }
    
    public function parents(){
        return $this->hasMany('App\Parents');
    }
}
