<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('login.getLogin');
    }
    public function storeLogin(Request $request){
        
   
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        
        $this->validate($request,$rules);
        
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           
           if(Auth::user()->role->name == 'Administrator'){ 
               return redirect()->route('users.index'); 
           }elseif(Auth::user()->role->name == 'Professor'){
               return redirect()->route('professor.index');
           }elseif(Auth::user()->role->name == 'Parent'){
               return redirect()->route('parent.index');
           }
        }
        return redirect()->back();
    }
    public function logout(){
        
        if(Auth::check()){
            
            Auth::logout();
        }
        return redirect()->route('login');
    }
}
