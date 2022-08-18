<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {
        $data = Products::get();
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
        $imgArr = [];
        $sizeArr = [];

        foreach ($request->images as $file) {
            $filename = Date('usiHd') . $file->getClientOriginalName(); //change the .temp name to its original name. Avoiding collision upto microsecond
            $resize = Image::make($file->getRealPath());
            $resize->resize(210, 210);
            $resize->save('img/products/' . $filename); //move to path with filename, took absolutely forever
            array_push($imgArr, $filename);
        }

        foreach ($request->size as $size) {
            array_push($sizeArr, $size);
        }

        $product->Product_Name = $request->name;
        $product->Category_ID = $request->category;
        $product->Price = $request->price;
        $product->Details = $request->details;
        $product->Images = implode("@@@", $imgArr);
        $product->Size = implode(" ", $sizeArr);
        $product->Available = $request->available;
        $product->save();

        return redirect()->back()->with('success', 'Product added successfully!');
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
            'Product_Name' => $request->name,
            'Category_ID' => $request->category,
            'Price' => $request->price,
            'Details' => $request->details,
            'Images' => $request->images,
            'Size' => $request->size,
            'Available' => $request->available,
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function delete($id)
    {
        $data = Products::where('Product_ID', '=', $id)->first();
        $imgArr = explode("@@@", $data->Images);
        foreach ($imgArr as $image) {
            $path = public_path('img/products/' . $image);
            File::delete($path);
        }
        Products::where('Product_ID', '=', $id)->delete();  //Delete images before deleting the stored names of the images in DB
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function search()
    {
        $search = $_GET['search'];
        if ($search === "") {
            $data = Products::get();
            return view('Admin.Products.list', compact('data'));
        } else {
            $data = Products::where('Product_Name', 'LIKE', '%' . $search . '%')->get();
            if ($data->count() !== 0) {
                return view('Admin.Products.list')
                    ->with('data', $data)
                    ->with('notify', 'Showing search results for "' . $search . '".');
            } else {
                $data = Products::get();
                return view('Admin.Products.list')->with('data', $data)
                    ->with('fail', 'No result found for "' . $search . '".');
            }
        }
    }
}
