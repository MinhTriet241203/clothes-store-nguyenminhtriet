<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\DBAL\TimestampType;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Categories::get();
        //return $data;
        return view('Admin.Category.list', compact('data'));
    }

    public function add()
    {
        return view('Admin.Category.add');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = new Categories();

        $category->Category_Name = $request->name;
        $category->save();

        return redirect()->back()->with('success','Category added successfully!');
    }   

    public function edit($id)
    {
        $data = Categories::where('Category_ID', '=', $id)->first();
        return view('Admin.Category.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $id = $request->id;
        Categories::where('Category_ID', '=', $id)->update([
            'Category_Name' =>$request->name,
        ]);
        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    public function delete($id)
    {
        Categories::where('Category_ID', '=', $id)->delete();
        return redirect()->back()->with('success','Category deleted successfully');
    }

}
