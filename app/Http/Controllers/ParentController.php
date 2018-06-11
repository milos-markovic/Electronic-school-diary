<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');;
    }
    
    public function index(){
        
        return view('parent.index');
    }
    public function studentDetails(Student $student){
        
        $classroom = $student->classroom()->first();
        
        $subjects = $classroom->programs()->with('subject')->get()->pluck('subject');

        
        return view('parent.studentDetails',compact('student','subjects','classroom'));
    }
}
