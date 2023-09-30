<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Controller
{
    function ShowDashboard(){
        $title = 'Dashboard User';
        $CountKomen = komentar::where('id_user',Auth::user()->id)->count();
        return view('user.dashboard', compact('title','CountKomen'));
    }
}
