<?php

namespace App\Http\Controllers;

use App\Subject;

use Illuminate\Http\Request;

class AdminSubjectsController extends Controller
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
        $subjects = Subject::all();
        
        
        return view('admin.subjects.index',compact('subjects'));
    }

   
    public function store(Request $request)
    {
        $rules = ['name' => 'required'];
        
        $this->validate($request, $rules);
        
        $createSubject = Subject::create($request->all());
        
        return redirect()->route('subjects.index');
    }

    
    
    public function destroy(Subject $subject)
    {
        $deleteSubject = $subject->delete();
        
        return redirect()->route('subjects.index');
    }
}
