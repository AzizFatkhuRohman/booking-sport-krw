@extends('layouts.app')
@section('content')
@if (session('msg'))
 <script>
  Swal.fire({
  icon: 'success',
  title: 'Komentar',
  text: '{{session('msg')}}'
})
  </script>
  @endif
  @error('body')
  <div class="alert alert-danger" role="alert">
    {{$message}}
  </div>
   @enderror
<div class="card mb-3">
      <img src="/order/{{$data->poto}}" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$data->vendor}}</h5>
        <p class="card-text">Rp.{{$data->harga}}</p>
        <p class="card-text">{{$data->deskripsi}}</p>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Order Sekarang</button>
        <a href="/user/order-post-order"></a>
      </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>
<div>
  <h5><small class="text-muted">Komentar {{$CountKomen}}</small></h5>
</div>
<form action="/user/post-komentar" method="post">
  @csrf
  <div class="mb-2">
    <input type="text" value="{{$data->id}}" name="id_order" hidden>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="komentar {{Auth::user()->name}}" name="body">
    <button type="submit" class="btn btn-primary btn-sm mt-2">Kirim</button>
  </div>
</form>
@foreach ($ShowKomen as $item)
<div style="padding-left:1rem; padding-right:1rem;">
  <div>
    <span><b>{{$item->name}}</b></span>
  </div>
  <div>
    <p>{{$item->body}}</p>
    <hr>
  </div>
</div>
@endforeach
@endsection