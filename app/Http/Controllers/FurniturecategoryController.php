<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FurniturecategoryController extends Controller
{
      public function detail($slug,){
        return view('category');
    }

}
