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
    public function dashboard(){
        return view('Admin.Dashboard');
    }

    public function index()
    {
        $data = Admins::get();
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
        $admin->Admin_Class = $request->class;
        $admin->Admin_Name = $request->name;
        $admin->save();

        return redirect()->back()->with('success', 'Admin added successfully!');
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
        if ($username !== 'admin') {
            $admin->Admin_Password = Hash::make($request->password);
        } else {
            $admin->Admin_Password = $request->password;
        }
        $admin->Admin_Name = $request->name;
        $admin->Admin_Class = $request->class;

        Admins::where('Admin_Username', '=', $username)->update([
            'Admin_Password' => $admin->Admin_Password,
            'Admin_Name' => $admin->Admin_Name,
            'Admin_Class' => $admin->Admin_Class
        ]);
        return redirect()->back()->with('success', 'Admin updated successfully!');
    }

    public function delete($id)
    {
        if ($id !== 'admin') {
            Admins::where('Admin_Username', '=', $id)->delete();
            return redirect()->back()->with('success', 'Admin deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'cannot delete the default admin account');
        }
    }

    public function search()
    {
        $search = $_GET['search'];
        if ($search === "") {                                       //
            $data = Admins::get();                                  //return with message if search field is empty
            return view('Admin.Admins.list', compact('data'));      //
        } else {
            $name = Admins::where('Admin_Name', 'LIKE', '%' . $search . '%')->get();            //query search for likeliness in the admin_name column
            $username = Admins::where('Admin_Username', 'LIKE', '%' . $search . '%')->get();    //query search for likeliness in the admin_username column
            $data = $username->union($name);                                                    //combine results
            if ($data->count() !== 0) {
                return view('Admin.Admins.list')                                            //
                    ->with('data', $data)                                                   // return successful search data
                    ->with('notify', 'Showing search results for "' . $search . '".');      //
            } else {
                $data = Admins::get();                                                      //
                return view('Admin.Admins.list')->with('data', $data)                       //return with empty search data.
                    ->with('fail', 'No result found for "' . $search . '".');               //
            }
        }
    }
}
