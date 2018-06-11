<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $table = 'users';
    
    protected $fillable = ['first_name','last_name','email','password','role_id','photo_id'];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    
    
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function photo(){
         return $this->belongsTo('App\Photo');
    }
    public function students(){
        return $this->belongsToMany('App\Student','parent_student','parent_id','student_id');
    }
    
    
}
