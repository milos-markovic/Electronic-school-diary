<?php

namespace App\Http\Controllers;

use App\Student;
use App\Classroom;
use App\Photo;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;

class AdminStudentsController extends Controller
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
 
        $students = Student::all();
        
        return view('admin.students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $parents = \App\Role::find(3)->parents;
  
        
        return view('admin.students.create',compact('classrooms','parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
       $file = $request->photo;
       $fileName = $file->getClientOriginalName(); 
        
       if($file->storeAs('images',$fileName)){
           
           $storePhoto = Photo::create(['name' => $fileName ]);
           
           $input = $request->all();
           $input['photo_id'] = $storePhoto->id;
           $input['classroom_id'] = $request->classroom;
           
           
           $storeStudent = Student::create($input);
           $storeStudentParent = $storeStudent->parents()->attach($request->parent);
           
           return redirect()->route('students.index');
       }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $classrooms = Classroom::all();
        $parents = \App\Role::find(3)->parents;
       
        
        return view('admin.students.edit',compact('student','classrooms','parents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
       if($request->hasFile('photo') &&  \File::exists(public_path("images/$student->photo->name" )) ){
            unlink(public_path().'/images/'.$student->photo->name); 
       } 
       if($request->hasFile('photo')){
           
            $file = $request->photo;
            $fileName = $file->getClientOriginalName(); 

            if($file->storeAs('images',$fileName)){

                $updatePhoto = $student->photo()->update([ 'name' => $fileName ]);

            }
        }
        $input = $request->all();
        $input['classroom_id'] = $request->classroom;

        $updateParentStudent = $student->parents()->updateExistingPivot($student->parents()->first()->id, ['parent_id'=>$request->parent]);
        $updateStudent = $student->update($input);

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $deleteImage = unlink(public_path().'/images/'.$student->photo->name);
        
        $deleteStudent = $student->delete();
        $deletePhoto = $student->photo()->delete();
        
        return redirect()->route('students.index');
    }
    
    public function details(Student $student){
        
        $class = $student->classroom;
        $classrooms = $class->programs()->with('subject','professor')->get();

        
        return view('admin.students.details',compact('student','classrooms'));
    }
}
