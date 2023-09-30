<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Controller
{
    function Dashboard(){
        $title ='Dasboard Admin';
        $data = order::where('vendor', Auth::user()->name)->count();
        return view('admin.dashboard', compact('title', 'data'));
    }
}
