<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FashioncategoryController extends Controller
{
     public function detail($slug,){
        return view('fashion');
    }
}
