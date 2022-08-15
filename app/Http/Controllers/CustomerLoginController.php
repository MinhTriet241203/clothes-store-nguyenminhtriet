<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\CustomerController;

class CustomerLoginController extends Controller
{
    public function login()
    {
        return view('Customer.customerLogin');
    }

    public function registration()
    {
        return view('Customer.customerRegister');
    }

    public function newCustomer()
    {
        route('saveCustomer');
    }

    public function signIn(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

<<<<<<< HEAD
        $user = Customers::where('Email', '=', $request->username)->first();
=======
        $user = Customers::where('User_Username', '=', $request->username)->first();
        
>>>>>>> c90790055ebcd88c744d225b5a28bddceeb11876

        if ($user) {
            if (Hash::check($request->password, $user->Customer_Password)) {
                $request->session()->put('customerLoginID', $user->Customer_ID);
                $request->session()->put('customerName', $user->Customer_Name);
                return redirect('/');
            } else {
                return back()->with('fail', 'Password do not match!');
            }
        } else {
            return back()->with('fail', 'This username is not registered!');
        }
    }

    public function logOut()
    {
        if (session()->has('LoginID')) {
            session()->pull('customerLoginID');
            session()->pull('customerName');
            return redirect('loginCustomer');
        }
    }
}
