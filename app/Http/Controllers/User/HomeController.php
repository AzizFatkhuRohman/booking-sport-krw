<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\order;

class HomeController extends Controller
{
    function home(){
        $title = 'Home';
        $data = order::orderBy('created_at', 'desc')->get();
        return view('user.home',compact('title','data'));
    }
}
