<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Categories::get();
        return view('Admin.Category.list', compact('data'));
    }

    public function add()
    {
        return view('Admin.Category.add');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);

        $category = new Categories();

        $filename = Date('usiHd').$request->Category_Image->getClientOriginalName(); //move uploaded image to category folder then save the name
        $request->Category_Image->move(public_path('\img\categories'), $filename);
        
        $category->Category_Name = $request->name;
        $category->Category_Image = $filename;
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
            'name' => 'required',
            'image' => 'required',
        ]);

        $id = $request->id;
        Categories::where('Category_ID', '=', $id)->update([
            'Category_Name' =>$request->name,
            'Category_Image' =>$request->image
        ]);
        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    public function delete($id)
    {
        $data = Categories::where('Category_ID', '=', $id)->first();
        $path = public_path('img/categories/'.$data->Category_Image);
        File::delete($path);
        Categories::where('Category_ID', '=', $id)->delete();
        return redirect()->back()->with('success','Category deleted successfully');
    }

}
