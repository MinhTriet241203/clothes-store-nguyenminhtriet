<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class socialAuthController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $Customer = Socialite::driver('google')->user();
        return $this->createOrUpdateUser($Customer);
    }

    public function createOrUpdateUser($data)
    {
        $name = explode('.', $data->email);
        $data->username = $name[0];
        //split email before '@' into username
        
        $Customer = Customers::where('Email', '=', $data->email)->where('Customer_Username', '=', $data->username)->first();
        //query customer for matching email or username with the google account

        if (!$Customer) {

            $customer = new Customers();

            $customer->Customer_Username = $data->username;
            $customer->Customer_Name = $data->name;
            $customer->Email = $data->email;
            $customer->Customer_Password = Hash::make('EmptyPasswordForGoogleAccount'); //default password LMAO

            $customer->save();  //register

            $Customer = Customers::where('Email', '=', $data->email)->first();

            session()->put('customerLoginID', $Customer->Customer_ID);
            session()->put('customerName', $Customer->Customer_Name);   //Log in user
            session()->put('loggedWith', 'google');

            return redirect('/');
        } else {

            $customer = new Customers();

            $customer->Customer_Username = $data->username;
            $customer->Customer_Name = $data->name;
            $customer->Email = $data->email;

            Customers::where('Customer_ID', '=', $data->email)->update([
                'Customer_Name' => $customer->Customer_Name,
                'Customer_Username' => $customer->Customer_Username,    //update the name and username if user email 
                                                                        //matches since the system allows for no duplicate emails
            ]);

            session()->put('customerLoginID', $Customer->Customer_ID);
            session()->put('customerName', $Customer->Customer_Name);   //putting user into session - Log in user
            session()->put('loggedWith', 'google');
            return redirect('/');
        }
    }
}
