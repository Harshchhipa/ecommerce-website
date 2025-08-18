<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplincescategoryController extends Controller
{
      public function detail($slug,){
        return view('applinces');
    }
}
