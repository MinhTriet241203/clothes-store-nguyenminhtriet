<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Customers;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ProductController;
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
            'email' => 'required|unique:Customers',
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

    public function home()
    {
        $data = Products::get();
        return view('Navigate.home', compact('data'));
    }
    public function shop()
    {
        $data = Products::get();
        return view('Navigate.shop', compact('data'));
    }
    public function about()
    {
        $data = Products::get();
        return view('Navigate.about', compact('data'));
    }
    public function contact()
    {
        return view('Navigate.contact');
    }
    public function shopSingle($id)
    {
        $data = Products::where('Product_ID','=',$id)->first();
        return view('Navigate.shopSingle', compact('data'));
    }
}