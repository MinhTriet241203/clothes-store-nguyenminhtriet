<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminLoginController extends Controller
{
    public function login(){
        return view('Admin.Auth.login');
    }

    public function registration(){
        return view('Admin.Auth.AddAdmin');
    }

    public function newAdmin(){
        route('saveAdmin');
    }

    public function signIn(Request $request){

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Admins::where('Admin_Username','=',$request->username)->first();

        if ($user) {
            if(Hash::check($request->password, $user->Admin_Password)){
                $request->session()->put('LoginID',$user->Admin_Username);
                $request->session()->put('Name',$user->Admin_Name);
                return redirect('listAdmin');
            }else{
                return back()->with('fail', 'Password do not match! ('.$user->password.')');
            }
        } else {
            return back()->with('fail', 'This email is not registered!');
        }       
        
    }

    public function logOut(){
        if (session()->has('LoginID')) {
            session()->pull('LoginID');
            return redirect('loginAdmin');
        }
    }
    
}