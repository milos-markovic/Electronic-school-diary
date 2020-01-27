<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Photo;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use \App\Http\Requests\UserRequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
       // $this->middleware('auth');;
    }
    
    public function index()
    {       
        $users = User::all();
        
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userRoles = Role::all();
  
        
        return view('admin.users.create',compact('userRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if ($request->hasFile('photo_id')) {
    
            $fileName = $request->photo_id->getClientOriginalName();
           
            $request->photo_id->storeAs('images',$fileName);
            
            $storePhoto = Photo::create(['name' => $fileName]);
            
        }
        $input = $request->all();
        $input['photo_id'] = $storePhoto->id;
        
        $storeUser = User::create($input);
        
        return redirect()->route('users.index');
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
    public function edit(User $user)
    {
        $userRoles = Role::all();
        
        return view('admin.users.edit',compact('user','userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {        
        if($request->hasFile('photo_id') && \File::exists(public_path("images/$user->photo->name" ))){  
            unlink(public_path().'/images/'.$user->photo->name);
        }
        
        if ($request->hasFile('photo_id')) {
    
            $fileName = $request->photo_id->getClientOriginalName();
           
            $request->photo_id->storeAs('images',$fileName);
            
            $updatePhoto = $user->photo()->update(['name' => $fileName]);
        }
        
        $input = $request->all();
        $input['photo_id'] = $user->photo->id;
        
        $updateUser = $user->update($input);
        
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       
       $deleteImage = unlink(public_path().'/images/'.$user->photo->name);
       
       if($deleteImage){
           
           $deleteUser = $user->delete();

           $deletePhoto = $user->photo()->delete();
           
           return redirect()->route('users.index')->with('status', 'User '.$user->first_name.' '.$user->last_name.' has been successfully deleted');
       }
    }
}
