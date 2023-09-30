<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function AttempLogin(Request $req){
        $data = [
            'email' => $req->input('email'),
            'password' => $req->input('password'),
        ];
        if (Auth::attempt($data)) {
            $user = Auth::user()->role;
            if ($user == 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user=='user') {
                return redirect('/home');
            } elseif ($user=='dev') {
                return redirect('/dev/dashboard');
            }
        }else{
            return redirect()->back();
        }
    }
    function register(){
        return view('auth.register');
    }
    function PostRegister(Request $req){
        $validasi = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|confirmed'
        ]);
        if($validasi->fails()){
            return redirect('/register')->withErrors($validasi);
        }else{
            User::create([
                'name' => $req->name,
                'email' => $req->email,
                'password' => Hash::make($req->password),
            ]);
            return redirect('/login')->with('msg','Akun berhasil dibuat');
        }
        
    }
    function Logout(){
        Auth::logout();
        return redirect('/');
    }
}
