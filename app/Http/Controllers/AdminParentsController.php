<?php

namespace App\Http\Controllers;

use App\Role;
use App\Photo;
use App\parents;
use App\Classroom;
use App\Student;
//use Illuminate\Http\Request;
use App\Http\Requests\ParentRequest;
use App\Http\Requests\UpdateParentRequest;
use App\Http\Requests\ParentStudentRequest;
use App\Http\Requests\UpdateParentSudentRequest;

class AdminParentsController extends Controller
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
       $parents = Role::find(3)->parents;
        
       return view('admin.parents.index',compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.parents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParentRequest $request)
    {
        $file = $request->photo;

        
        $fileName = $file->getClientOriginalName();
        
        if($file->storeAs('images', $fileName)){
            
            $storePhoto = Photo::create(['name' => $fileName]);
            
            $input = $request->all();
            $input['photo_id'] = $storePhoto->id;
            
            $storeParent = Role::find(3)->parents()->create($input);
            
            return redirect()->route('parents.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Parents $parent)
    {                
        return view('admin.parents.show',compact('parent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Parents $parent)
    {
        
       return view('admin.parents.edit',compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParentRequest $request, Parents $parent){
    
        if($request->hasFile('photo')  &&  \File::exists(public_path("images/$parent->photo->name" ))){
             unlink(public_path().'/images/'.$parent->photo->name);
        }
        
        if($request->hasFile('photo')){    
            $uploadedFile = $request->photo;
            $fileName = $uploadedFile->getClientOriginalName();
            
            if($uploadedFile->storeAs('images',$fileName)){
            
                $updatePhoto = $parent->photo()->update([ 'name'=> $fileName ]);
            }
        }
        $updateParent = $parent->update($request->all());
            
        return redirect()->route('parents.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parents $parent)
    {   
        $destroyPhoto = unlink(public_path().'/images/'.$parent->photo->name);
        
        $deleteParent = $parent->delete();
        $deletePhoto = $parent->photo()->delete();
        
        return redirect()->route('parents.index');
    }
    public function createStudent(Parents $parent){
        
        $classrooms = Classroom::all();
        
        return view('admin.parents.createStudent',compact('classrooms','parent'));
    }
    public function storeStudent(ParentStudentRequest $request, Parents $parent){
        
        $uploadFile = $request->photo;
        $fileName = $uploadFile->getClientOriginalName();
        
        if($uploadFile->storeAs('images',$fileName)){
            
            $storePhoto = Photo::create([ 'name'=>$fileName ]);
            
            $input = $request->all();
            $input['photo_id'] = $storePhoto->id;
            
            
            $storeStudent = Classroom::find($request->classroom)->students()->create($input);
            
            $storeParentStudents = $parent->students()->attach($storeStudent->id);
            
            return redirect()->route('parents.show',$parent->id);
        }
    }
    public function editStudent(Student $student){
        
        $classrooms = Classroom::all();
        
        return view('admin.parents.editStudent',compact('student','classrooms'));
    }
    public function updateStudent(UpdateParentSudentRequest $request,Student $student){
       
        if($request->hasFile('photo') && \File::exists(public_path("images/$student->photo->name" ))){
            unlink(public_path().'/images/'.$student->photo->name);
        }
        
        if($request->hasFile('photo')){
            
            $uploadFile = $request->photo;
            $fileName = $uploadFile->getClientOriginalName();

            if($uploadFile->storeAs('images',$fileName)){

                $updatePhoto = $student->photo()->update(['name' => $fileName]);
            }
        }
        $updateStudent = $student->update($request->all());

        return redirect()->route('parents.show',$student->parents()->first()->id);
    }
    public function destroyStudent(Parents $parent, Student $student){
        
        unlink(public_path().'/images/'.$student->photo->name);
        
        $deleteParenStudent = $parent->students()->detach($student->id);
        $deleteStudent = $student->delete();
        
        $deletePhoto = $student->photo()->delete();
        
        return redirect()->route('parents.show',$parent->id);
    }
    public function studentDetails(Student $student){
        
        $classroom = $student->classroom;
        
        $professors = $student->classroom->programs()->with('professor')->get()->pluck('professor');
     
        return view('admin.parents.studentDetails',compact('student','professors','classroom'));
    }
}
