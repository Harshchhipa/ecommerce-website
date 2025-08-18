<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrocerycategoryController extends Controller
{
     public function detail($slug,){
        return view('furniture');
    }
}
