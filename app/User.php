<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name','last_name','email','password','role_id','photo_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }
    
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst($value);
    }
    
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
    
    public function programs(){
        return $this->hasMany('App\Program','professor_id');
    }
    
    public function students(){
        return $this->belongsToMany("App\Student",'parent_student','parent_id','student_id');
    }
       
    
    
}
