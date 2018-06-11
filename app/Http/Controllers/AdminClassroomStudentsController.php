<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Student;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;

class AdminClassroomStudentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');;
    }
    
    public function index(Classroom $classroom){
        
        $students = $classroom->students;
        
        return view('admin.classes.classStudents',compact('students','classroom'));
    }
    public function create(Classroom $classroom){
        
        $classrooms = Classroom::all();
        $parents = \App\Role::find(3)->parents;
        
        return view('admin.classes.createStudent',compact('classroom','classrooms','parents'));
    }
    public function store(Classroom $classroom,StudentRequest $request){
  
        $fileUpload = $request->photo;
        $fileName = $fileUpload->getClientOriginalName();
        
        if($fileUpload->storeAs('images',$fileName)){
            
            $storePhoto = \App\Photo::create( ['name' => $fileName]);
            
            $input = $request->all();
            $input['photo_id'] = $storePhoto->id;
            
            $storeStudent = $classroom->students()->create($input);
            $storeStudentParent = $storeStudent->parents()->attach($request->parent);
                
            return redirect()->route('classroom.studentsIndex',$classroom->id);    
        }

        
    }
    public function edit(Student $student){
        
        $classrooms = Classroom::all();
        $parents = \App\Role::find(3)->parents;
        
        return view('admin.classes.editStudent',compact('student','classrooms','parents'));
        
    }
    public function update(Student $student,StudentRequest $request){
        
       //unlink(public_path().'/images/'.$student->photo->name); 
        
       $file = $request->photo;
       $fileName = $file->getClientOriginalName(); 
        
       if($file->storeAs('images',$fileName)){
           
           $updatePhoto = $student->photo()->update([ 'name' => $fileName ]);
           
           $input = $request->all();
           $input['classroom_id'] = $request->classroom;
           
           $updateStudent = $student->update($input);
           $updateParentStudent = $student->parents()->updateExistingPivot($student->parents()->first()->id, ['parent_id'=>$request->parent]);
                      
           return redirect()->route('classroom.studentsIndex',$student->classroom_id);
       }
        
    }
    public function destroy(Classroom $classroom,Student $student){
        
        unlink(public_path().'/images/'.$student->photo->name);
        
        $parent = $student->parents()->first();
        
        $deleteParentStudent = $parent->students()->detach($student->id);
        $deleteStudent = $classroom->students()->find($student->id)->delete();

        $deletePhoto = $student->photo()->delete();
        
        return redirect()->route('classroom.studentsIndex',$classroom->id);
    }
    public function studentDetails(Classroom $classroom,Student $student){
     
        $subjects = $classroom->programs()->with('subject')->get()->pluck('subject');
      
        
        return view('admin.classes.studentDetails',compact('classroom','student','subjects'));
    }
}
