<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function about(){
        return view('components.about', ['title'=> 'About']);
    }
}
