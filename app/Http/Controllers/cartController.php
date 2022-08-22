<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use App\Models\Customers;
use App\Models\Order_details;
use App\Models\Orders;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //hanlde when customer addCard
    public function addCart($id)    //This has been an excruciatingly painful experience due to my inexperience in coding as well as my laziness.
    {
        if (isset($_GET['size'])) {
            
            $product = Products::where('Product_ID', '=', $id)->first();
            $Product_ID = $product->Product_ID;
            $name = $product->Product_Name;
            $size = $_GET['size'];
            $quanity = $_GET['quanity'];
            $price = $product->Price;           //getting the neccessary information
            $imgs = explode("@@@", $product->Images);
            $img = $imgs[0];

            $_SESSION['cart'] = array();

            $item = collect([
                "name" => $name,
                "id" => $id,
                "size" => $size,
                "quantity" => $quanity,         //putting them in a collection.
                "price" => $price,
                "img" => $img,
            ]);

            session()->push('cart', $item);     //push new collection to session('cart)

            $categories = Categories::get();
            $products = Products::get();        //dependent product and categories data
            return view('Navigate.shop', compact('products', 'categories'));
        }
    }

    public function removeItem($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        $cart = array_values($cart);
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Removed the selected item from the cart.');
    }

    public function purchase(Request $request){

        foreach (session('cart') as $row){

            $productsAddedCart = collect([
                "productID" => $row['id'],
                "size" => $row['size'],
                "quantity" => $row['quantity'],
            ]);
        }
        $Orders = new Orders();
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
        ]);

        $Order_details = new Order_details();

        $Order_details->Receive_Address = $request->address;
        $Order_details->Receive_Phone = $request->phone;
        $Order_details->Order_ID = session()->get('customerLoginID');
        $Order_details->save();

        $categories = Categories::get();
        return view('Navigate.purchase' , compact('categories'));
    }
}
