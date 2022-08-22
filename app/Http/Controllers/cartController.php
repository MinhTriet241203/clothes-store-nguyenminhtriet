<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use App\Models\Customers;
use App\Models\Order_details;
use App\Models\Orders;
use Illuminate\Http\Request;
use Carbon\Carbon;

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



        $orders = new Orders();

        $request->validate([
            'address' => 'required',
            'phone' => 'required|max:10'
        ]);

        $orders->Receive_Address = $request->address;
        $orders->Receive_Phone = $request->phone;
        $orders->Customer_ID = session()->get('customerLoginID');
        $orders->Note = $_POST['note'];

        $currentTime = Carbon::now();//get current time 
        $orders->Date = $currentTime;

        $orders->save();

        $OrderID = session()->get('customerLoginID');

        
        // $order_details->Product_ID = $productsAddedCart;
        foreach (session('cart') as $row){

            // $productsAddedCart = collect([
            //     "productID" => $row['id'],
            //     "size" => $row['size'],
            //     "quantity" => $row['quantity'],
            // ]);
            //$Order_ID = Orders::where('Customer_ID', '=', session()->get('customerLoginID'));
            $order_details = new Order_details();
            $order_details->Order_ID = $OrderID;
            $order_details->Product_ID = $row['id'];
            $order_details->Size = $row['size'];
            $order_details->Quantity = $row['quantity'];

            $order_details->save();
        }
        
        

        $categories = Categories::get();
        // return redirect()->back()->with('success', 'Product added successfully!');
        return view('Navigate.cart' , compact('categories'))->with('success', 'Removed the selected item from the cart.');
    }
}
