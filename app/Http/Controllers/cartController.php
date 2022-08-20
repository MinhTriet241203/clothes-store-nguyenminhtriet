<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
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
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Removed the selected item from the cart.');
    }
}
