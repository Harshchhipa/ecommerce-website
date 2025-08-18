<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectronicscategoryController extends Controller
{
     public function detail($slug,){
        return view('electronics');
    }
}
