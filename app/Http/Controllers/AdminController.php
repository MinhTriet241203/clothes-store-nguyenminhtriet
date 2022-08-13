<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admins;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\DBAL\TimestampType;

//Another test

class AdminController extends Controller
{
    public function index()
    {
        $data = Admins::get()->where('Admin_Username', '!=', 'admin'); //get admin list excluding the default 'admin' account
        //return $data;
        return view('Admin.Admins.list', compact('data'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins,Admin_Username',
            'name' => 'required',
            'password' => 'required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required'
        ]);

        $admin = new Admins();

        $admin->Admin_Username = $request->username;
        $admin->Admin_Password = Hash::make($request->password);
        $admin->Admin_Name = $request->name;
        $admin->save();

        return redirect()->back()->with('success','Admin added successfully!');
    }   

    public function edit($id)
    {
        $data = Admins::where('Admin_Username', '=', $id)->first();
        return view('Admin.Admins.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required'
        ]);

        $username = $request->username;
        $admin = new Admins();
        $admin->Admin_Password = Hash::make($request->password);
        $admin->Admin_Name = $request->name;

        Admins::where('Admin_Username', '=', $username)->update([
            'Admin_Password' =>$admin->Admin_Password,
            'Admin_Name' =>$admin->Admin_Name,
        ]);
        return redirect()->back()->with('success', 'Admin updated successfully!');
    }

    public function delete($id)
    {
        Admins::where('Admin_Username', '=', $id)->delete();
        return redirect()->back()->with('success','Admin deleted successfully');
    }

}
