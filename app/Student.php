<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    
    protected $fillable = [ 'first_name','last_name','email','date_of_birth','photo_id','classroom_id' ];
    
    public function classroom(){
        
        return $this->belongsTo('App\Classroom');
    }
    
    public function photo(){
         return $this->belongsTo('App\Photo');
    }
    
    public function parents(){
        return $this->belongsToMany('App\Parents','parent_student','student_id','parent_id');
    }

    public function programs1(){
        return $this->hasMany('App\Program1');
    }
    
    public function users(){
        return $this->belongsToMany("App\User",'parent_student','parent_id','student_id');
    }
}
