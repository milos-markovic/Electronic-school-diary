<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = ['class_name','class_year','class_officer'];
    

    public function programs(){
         return $this->hasMany('App\Program');
    }
    
    public function students(){
        return $this->hasMany('App\Student');
    }
    
    public function subjects(){
        return $this->belongsToMany('App\Subject','subject_classroom');
    }
}
