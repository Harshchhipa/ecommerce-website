<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    // Show Signup Page
    public function signup()
    {
        return view('vendor.signup');
    }

    // Register Vendor
    public function register(Request $request)
    {
        $request->validate([
            "id_number" => "required",
            "full_name" => "required",
            "phone"     => "required|regex:/^[0-9]{10}$/|unique:vendors,phone",
            "email"     => "required|email|unique:vendors,email",
            "password"  => "required|min:6",
            "address"   => "required"
        ]);

        Vendor::create([
            "full_name" => $request->full_name,
            "phone"     => $request->phone,
            "email"     => $request->email,
            "password"  => Hash::make($request->password), // ✅ bcrypt hash
            "address"   => $request->address,
            "id_number" => $request->id_number,
        ]);

        return redirect()->back()->with('msg', 'Registered Successfully! Please wait for verification.');
    }

    // Show Login Page
    public function login()
    {
        return view('vendor.login');
    }

    // Login Vendor
    public function login_create(Request $request)
    {
        $request->validate([
            "phone"    => "required|regex:/^[0-9]{10}$/",
            "password" => "required"
        ]);

        $checkVendor=Vendor::where(['phone'=>$request->phone,])->first();

        if($checkVendor && Hash::check($request->password,$checkVendor->password)){

            if($checkVendor->status=="verified"){
                   session(['vendorLogin',true]);
                                      session(['vendorName'=>$checkVendor->full_name]);

            return redirect('vendor/');
            }else{
                return redirect('vendor/login')->with('msg','you are not verified');
            }


        }else{
            return redirect('vendor/login')->with('msg','invalid phone password');
        }
    }


    public function logout()
    {
        session()->forget(['vendorLogin', 'vendorId']);
        return redirect('vendor/login')->with('success', 'Logged out successfully.');
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
