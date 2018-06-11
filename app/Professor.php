<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
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
    
    public function programs()
    {
        return $this->hasMany('App\Program','professor_id');
    }


}

