<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program1 extends Model
{
    public function student(){
        return $this->belongsTo('App\Student');
    }
    
    public function subject(){
        return $this->belongsTo('App\Subject');
    }
    
    public function grade(){
        return $this->belongsTo('App\Grade');
    }
}
