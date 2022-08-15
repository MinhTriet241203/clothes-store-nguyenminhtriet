<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Customers;
use App\Models\Categories;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ProductController;
use Illuminate\Database\DBAL\TimestampType;

class CustomerController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'userName' => 'required|unique:Customers,Customer_Username',
            'name' => 'required',
            'password' => 'required|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'required',
            'email' => 'required|unique:Customers',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'DoB' => 'required'
        ]);

        $customers = new Customers();
        
        $customers->Customer_Username = $request->userName;
        $customers->Customer_Password = Hash::make($request->password);
        $customers->Customer_Name = $request->name;
        $customers->Email = $request->email;
        $customers->Phone = $request->phone;
        $customers->Address = $request->address;
        $customers->Gender = $request->gender;
        $customers->Date_of_Birth = $request->DoB;

        $customers->save();

        return redirect()->back()->with('success', 'Customers added successfully!');
    }

    public function homepage()
    {
        $data = Categories::get();
        $categories = Categories::inRandomOrder()->limit(6)->get(); //asking to get only 6 categories randomly for featured
        return view('Navigate.home', compact('categories','data'));
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
    public function shopSingle()
    {
        $data = Products::get();
        return view('Navigate.shopSingle', compact('data'));
    }

    
    public function cart()
    {
        $data = Products::get();
        return view('Navigate.cart', compact('data'));
    }
    
    
    
    
    //View customers on admin page
    public function index()
    {
        $data = Customers::get();
        return view('Admin.Customer.list', compact('data'));
    }
}
