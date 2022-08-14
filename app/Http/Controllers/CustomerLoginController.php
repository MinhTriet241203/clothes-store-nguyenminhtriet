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

        $user = Customers::where('User_Username', '=', $request->username)->first();

        if ($user) {
            if (Hash::check($request->password, $user->Admin_Password)) {
                $request->session()->put('LoginID', $user->Customer_ID);
                $request->session()->put('Name', $user->Customer_Name);
                return redirect('');
            } else {
                return back()->with('fail', 'Password do not match! (' . $user->password . ')');
            }
        } else {
            return back()->with('fail', 'This username is not registered!');
        }
    }

    public function logOut()
    {
        if (session()->has('LoginID')) {
            session()->pull('LoginID');
            return redirect('loginAdmin');
        }
    }
}
