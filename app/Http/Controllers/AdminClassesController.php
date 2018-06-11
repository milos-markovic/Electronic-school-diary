<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Professor;

use Illuminate\Http\Request;
use \App\Http\Requests\ClassRequest;

class AdminClassesController extends Controller
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
       // dd(1);
        
        $classes = Classroom::all();
        
        
        return view('admin.classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $professors = \App\Role::find(2)->professors;

        
        return view('admin.classes.create',compact('professors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {
        $classOfficer = Classroom::where('class_officer','=',$request->class_officer)->first();
        
        if($classOfficer){
            
            return redirect()->back();
        }
        
        
        $createClass = Classroom::create($request->all());
        
        return redirect()->route('classroom.index');
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
    public function edit(Classroom $classroom)
    {
        $professors = \App\Role::find(2)->professors;

        
        return view('admin.classes.edit',compact('classroom','professors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRequest $request, Classroom $classroom)
    {
        
        $updateClassroom = $classroom->update($request->all());
        
        return redirect()->route('classroom.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $deleteClassroom = $classroom->delete();
        
        return redirect('admin/classroom');
    }
}
