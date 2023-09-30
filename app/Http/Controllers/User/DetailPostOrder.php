<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\komentar;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class DetailPostOrder extends Controller
{
    function ShowDetailPost($id){
        $title = 'Detail Post';
        $data = order::find($id);
        $CountKomen = komentar::where('id_order',$id)->count();
        $ShowKomen = komentar::join('users', 'komentar.id_user', '=', 'users.id')
        ->select('komentar.id_order', 'komentar.created_at', 'komentar.body', 'users.name')
        ->where('komentar.id_order', $id)
        ->orderBy('komentar.created_at','desc')
        ->get();
        return view('user.detail-post', compact('title','data',
        'CountKomen','ShowKomen'));
    }
    function PostKomentar(Request $req){
        $validasi = Validator::make($req->all(),[
            'body'=>'required|max:255'
        ]);
        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi);
        } else {
            komentar::create([
                'id_user'=>Auth::user()->id,
                'id_order'=>$req->id_order,
                'body'=>$req->body
            ]);
            return redirect()->back()->with('msg','Berhasil terkirim');
        }
        
    }
}
