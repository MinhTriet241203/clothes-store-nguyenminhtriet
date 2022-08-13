<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Products;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\DBAL\TimestampType;

class ProductController extends Controller
{
    public function index()
    {
        $data = Products::get();
        //return $data;
        return view('Admin.Products.list', compact('data'));
    }

    public function add()
    {
        $data = Categories::get();
        return view('Admin.Products.add', compact('data'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|integer',
            'details' => 'required',
            'images' => 'required',
            'size' => 'required',
            'available' => 'required',
        ]);

        $product = new Products();

        $product->Product_Name = $request->name;
        $product->Category_ID = $request->category;
        $product->Price = $request->price;
        $product->Details = $request->details;
        $product->Images = implode(" ",$request->images);
        $product->Size = $request->size;
        $product->Available = $request->available;
        $product->save();

        return redirect()->back()->with('success','Product added successfully!');
    }   

    public function edit($id)
    {
        $data = Products::where('Product_ID', '=', $id)->first();
        return view('Admin.Products.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|integer',
            'details' => 'required',
            'images' => 'required',
            'size' => 'required',
            'available' => 'required',
        ]);

        $id = $request->id;
        Products::where('Product_ID', '=', $id)->update([
            'Product_Name' =>$request->name,
            'Category_ID' =>$request->category,
            'Price' =>$request->price,
            'Details' =>$request->details,
            'Images' =>$request->images,
            'Size' =>$request->size,
            'Available' =>$request->available,
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function delete($id)
    {
        Products::where('Product_ID', '=', $id)->delete();
        return redirect()->back()->with('success','Product deleted successfully');
    }

    public function home()
    {
        $data = Products::get();
        return view('home', compact('data'));
    }
    public function shop()
    {
        $data = Products::get();
        return view('shop', compact('data'));
    }
    public function about()
    {
        $data = Products::get();
        return view('about', compact('data'));
    }
    public function contact()
    {
        $data = Products::get();
        return view('contact', compact('data'));
    }
    public function shopSingle()
    {
        $data = Products::get();
        return view('shopSingle', compact('data'));
    }
    public function login()
    {
       
        return view('login');
    }

}
