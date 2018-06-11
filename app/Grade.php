<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function programs1(){
        
         return $this->hasMany('App\Program1');
    }
    public function subjects(){
        return $this->belongsToMany("App\Subject",'subject_grade');
    }
}
