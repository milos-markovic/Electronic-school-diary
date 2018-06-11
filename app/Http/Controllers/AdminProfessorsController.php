<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Role;
use App\Photo;
use App\Professor;
use App\Subject;
use App\Classroom;

use Illuminate\Http\Request;
use \App\Http\Requests\ProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;

class AdminProfessorsController extends Controller
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
        $professors = Role::find(2)->professors;
        
        return view('admin.professors.index',compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.professors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessorRequest $request)
    {
       $uploadFile = $request->file;
       
       $fileName = $uploadFile->getClientOriginalName();
       
       if($uploadFile->storeAs('images',$fileName)){
           
           $storePhoto = Photo::create(['name' => $fileName]);
           
           $input = $request->all();
           $input['photo_id'] = $storePhoto->id;
           
           $storeProfessor = Role::find(2)->professors()->create($input);
           
           return redirect()->route('professors.index');
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
       /* $professor = Classroom::find($id);
        
        $createSubjectClass = $professor->subjects()->attach(1);
        
        return "ubacen je subject";
        * 
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        return view('admin.professors.edit',compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfessorRequest $request, Professor $professor)
    {
       if($request->hasFile('file') &&  \File::exists(public_path("images/$professor->photo->name" ))){
            unlink(public_path().'/images/'.$professor->photo->name); 
       } 
       
       if ($request->hasFile('file')) {
    
            $fileName = $request->file->getClientOriginalName();
           
            $request->file->storeAs('images',$fileName);
            
            $updatePhoto = $professor->photo()->update(['name' => $fileName]);
            
        }
        $updateProfessor = $professor->update($request->all());
        
        return redirect()->route('professors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {  
        unlink(public_path().'/images/'.$professor->photo->name);
          
        $programs = $professor->programs()->with('subject','classroom')->get();

        foreach($programs as $program){
           $deleteSubjectClassroom =  $program->subject->classrooms()->detach($program->classroom->id);
        }
        $deleteProfessor = $professor->delete();
        
        $deletePhoto = $professor->photo->delete();

        return redirect()->route('professors.index')->with('status','Profeessor '.$professor->first_name.' '.$professor->last_name .' has been deleted');
    }
    
    public function details(Professor $professor){
        
    
       $subjects = $professor->programs()->with('subject')->get()->pluck('subject')->unique();
        

       return view('admin.professors.details',compact('professor','subjects'));

    }
    public function addSubjects(Professor $professor){
              
        $subjects = Subject::all();
        $classrooms = Classroom::all();
        
        return view('admin.professors.addSubject',compact('professor','subjects','classrooms'));
    }
    public function storeSubjects(Professor $professor,Request $request){

       $rules = [
           'subject_id' => 'required',
           'classes' => 'required'
       ];
       $this->validate($request,$rules);

       foreach($request->classes as $class){
           
           $storeProgramTable = $professor->programs()->create([
               'subject_id' => $request->subject_id,
               'classroom_id' => $class
           ]);
           
           $storeSubjectClassroom = Subject::find($request->subject_id)->classrooms()->syncWithoutDetaching($class);
       }
 
       return redirect()->route('professor.details',$professor->id);

    }
    public function destroyProfessorSubject(Professor $professor,Subject $subject){
        
        $classroomsIds = $professor->programs()->where('subject_id',$subject->id)->with('classroom')->get()
                                                                                                    ->pluck('classroom')
                                                                                                    ->pluck('id')->toArray();
        
        $deleteProfessorSubject = $professor->programs()->where('subject_id','=',$subject->id)->delete();
        
        $deleteSubjectClassroms = $subject->classrooms()->detach($classroomsIds);
        
        return redirect()->route('professor.details',$professor->id);
     
    }
    public function destroyProfessorSubjectClass(Professor $professor,Subject $subject, Classroom $class){

        $deleteClassroom = $professor->programs()->where('subject_id','=',$subject->id)->where('classroom_id','=',$class->id)->delete();
        $deleteSubjectClassrooms = $subject->classrooms()->detach($class->id);
        
        return redirect()->route('professor.details',$professor->id);
    }
    public function sentAjax(Request $request){

       $subjects = Subject::find($request->subject)->programs()->with('classroom')->get();

        $subjectClassrooms = collect();
        
        foreach($subjects as $subject){
            $subjectClassrooms[] = $subject->classroom;
        }
      
        
        $classrooms = Classroom::all();
        
        $diffClassrooms = $classrooms->diff($subjectClassrooms);
        
        return $diffClassrooms;
    
        
    }
    public function classroomStudents(Classroom $classroom){
        
        return view('admin.professors.classroomStudents',compact('classroom'));
    }
    public function studentDetails(\App\Student $student){
        
        $subjects = $student->classroom()->first()->programs()->with('subject')->get()->pluck('subject');
        
        $classroom = $student->classroom;
        
        return view('admin.professors.studentDetails',compact('student','subjects','classroom'));
    }
}
