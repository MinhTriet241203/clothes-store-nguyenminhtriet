<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Customers;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\DBAL\TimestampType;

class UserController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'userName' => 'required|unique:Customers,Customer_Username',
            'name' => 'required',
            'password' => 'required_with:confirm_password|same:confirm_password',
            'confirmPassword' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'DoB' => 'required'
        ]);

        $customers = new Customers();

        $customers->Customer_Username = $request->username;
        $customers->Customer_Password = Hash::make($request->password);
        $customers->Customer_Name = $request->name;
        $customers->Email = $request->email;
        $customers->Phone = $request->phone;
        $customers->Address = $request->address;
        $customers->Gender = $request->gender;
        $customers->Date_of_Birth = $request->DoB;
        
        $customers->save();

        return redirect()->back()->with('success','Customers added successfully!');
    }
}