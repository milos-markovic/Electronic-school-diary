<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];
    
    public function programs(){
        
         return $this->hasMany('App\Program');
    }
    
    public function programs1(){
        
         return $this->hasMany('App\Program1');
    }
    public function grades(){
        return $this->belongsToMany('App\Grade','subject_grade');
    }
    public function classrooms(){
         return $this->belongsToMany('App\Classroom','subject_classroom');
    }
   
}
