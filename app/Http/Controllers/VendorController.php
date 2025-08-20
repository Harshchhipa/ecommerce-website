<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function signup(){
        return view('vendor/signup');
    }
     public function register(Request $request){
        $request->validate([
            "id_number"=>"required",
            "full_name" => "required",
            "phone" => "required|regex:/^[0-9]{10}/|unique:vendors,phone",
            "email" => "required|email|unique:vendors,email",
            "password" => "required",
            "address" => "required"
]);

Vendor::create([
    'full_name' => $request->full_name,
    'phone'     => $request->phone,
    'email'     => $request->email,
    'password'  => bcrypt($request->password),
    'address'   => $request->address,
    'id_number' => $request->id_number, // <-- add this only if id_number is required
]);

return redirect('vendor/signup')->with('msg', 'Registered Successfully');
     }



    public function login(){
        return view('vendor/login');
    }

    public function forget(){
        return view('vendor/forget');
    }

    public function index(){
        return view('vendor/index');
    }

    public function addproduct(){
        return view('vendor/add-product');
    }

    public function viewproduct(){
        return view('vendor/view-product');
    }

    public function editproduct(){
        return view('vendor/edit-product');
    }

    public function orders(){
        return view('vendor/orders');
    }

    public function orderdetail(){
        return view('vendor/order-detail');
    }

    public function users(){
        return view('vendor/users');
    }

    public function profile(){
        return view('vendor/profile');
    }
}
