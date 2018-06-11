<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    
    protected $table = 'programs';
    
    protected $fillable = ['professor_id','subject_id','classroom_id'];
    
    
    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }
    
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
    
    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
