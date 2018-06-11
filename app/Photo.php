<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    protected $fillable = ['name'];
    
    public function users(){
           return $this->hasOne('App\user');
    }
    
    public function professors(){
           return $this->hasOne('App\user');
    }
    
    public function parents(){
           return $this->hasOne('App\Parents');
    }
    
    public function student(){
           return $this->hasOne('App\Student');
    }

}
