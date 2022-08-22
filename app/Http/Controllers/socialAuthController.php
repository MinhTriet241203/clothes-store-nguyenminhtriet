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
        $Customer = Customers::where('Email', '=', $data->email)->first();
        if (!$Customer) {
            $name = explode('@', $data->email);
            $data->username = $name[0]; //split email before '@' into username
            return view('Customer.customerRegister')->with('data', $data)
                ->with('social', 'You seem to have a new account, please add in your details first!');  //check for existing email to redirect to register
        } else {
            $name = explode('@', $data->email);
            $data->username = $name[0];
            if ($data->username === $Customer->Customer_Name && $data->name === $Customer->Customer_Name) {
            }
        }
    }
}
