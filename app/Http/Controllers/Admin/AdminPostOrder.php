<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Http\Request;

class AdminPostOrder extends Controller
{
    function ShowPostOrder(){
        $title = 'Post Order Admin';
        $data = order::where('vendor', Auth::user()->name)->orderBy('created_at','desc')->get();
        return view('admin.post-order', compact('title','data'));
    }
    function PostPostOrder(Request $req){
        $validasi = Validator::make($req->all(),[
            'kategori'=>'required',
            'harga'=>'required|numeric',
            'poto'=>'required|image|mimes:jpg,png,jpeg',
            'deskripsi'=>'required'
        ]);
        if($validasi->fails()){
            return redirect()->back()->withErrors($validasi);
        }else{
            $file = $req->file('poto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path('order'), $nama_file);
            order::create([
                'vendor'=>Auth::user()->name,
                'kategori'=>$req->kategori,
                'harga'=>$req->harga,
                'poto'=>$nama_file,
                'deskripsi'=>$req->deskripsi
            ]);
            return redirect()->back()->with('msg','Post order berhasil di buat');
        }
    }

    function PostOrderDetail(string $id){
        $title = 'Detail Post Order';
        $data = order::find($id);
        return view('admin.post-order-detail', compact('title','data'));
    }

    function PostOrderUpdate(Request $req, $id){
        $validasi = Validator::make($req->all(),[
            'kategori'=>'required',
            'harga'=>'required|numeric',
            'deskripsi'=>'required'
        ]);
        if($validasi->fails()){
            return redirect()->back()->withErrors($validasi);
        }else{
            order::where('id',$id)->update([
                'kategori'=>$req->kategori,
                'harga'=>$req->harga,
                'deskripsi'=>$req->deskripsi
            ]);
            return redirect()->back()->with('msg','Data post order berhasil di ubah');
        }
    }
    function PostOrderDelete($id){
        order::where('id', $id)->delete();
        // Storage::delete(public_path('order/'.$post->poto));
        // $post->delete();
        return redirect()->back()->with('del', 'Hapus post order berhasil');
    }
}
