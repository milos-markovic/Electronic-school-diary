<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Student;
use App\Subject;
use App\Grade;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $programs = Auth::user()->programs()->with('subject','classroom')->get();


        return view('professor.index',compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function classroomStudents(Classroom $classroom){
        
        return view('professor.student.classroomStudents',compact('classroom'));
    }
    public function studentDetails(Classroom $classroom,Student $student){
        
        $subjects =  $classroom->subjects;

       
        
        return view('professor.student.studentDetails',compact('student','subjects','classroom'));
    }
    public function insertGrade(Student $student,Subject $subject){
        
        $grades = \App\Grade::all();
        
        return view('professor.student.insertGrade',compact('student','subject','grades'));
        
    }
    public function storeGrade(Student $student, Request $request){
        
        $storeSubjectGrade = DB::table('program1s')->insert([
            'student_id' => $student->id,
            'subject_id' => $request->subject,
            'grade_id' => $request->grade 
        ]);
        
        return redirect()->route('professor.student.details',[$student->classroom->id,$student->id]);
    }
    public function removeGrade(Student $student,Subject $subject,Grade $grade){
        
       $removeGrade = DB::table('program1s')->where('student_id','=',$student->id)
                                            ->where('subject_id','=',$subject->id)
                                            ->where('grade_id','=',$grade->id)
                                            ->delete();
       
       return redirect()->route('professor.student.details',[$student->classroom->id,$student->id]);
    }
}
