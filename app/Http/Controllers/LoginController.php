<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
       
     return view('login.getLogin');
       
    }
    public function postLogin(Request $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            $role = Auth::user()->role->name;

            switch ($role) {
                case 'Administrator':
                    return redirect()->intended('admin/users');
                    break;
                case 'Professor':
                    return redirect()->intended('professor');
                    break;
                case 'Parent':
                    return redirect()->intended('parent');
                    break;
            }
        }
    }

    public function logout(){

        Auth::logout();

        return redirect()->route('getLogin');
    }
}
