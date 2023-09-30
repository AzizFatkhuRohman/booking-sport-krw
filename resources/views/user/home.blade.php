@extends('layouts.app')
@section('content')
<div>
  <div class="row">
    <div class="col-4">
      <select class="form-select" aria-label="Default select example">
        <option selected>Kategori</option>
        <option value="Futsal">Futsal</option>
        <option value="Mini Soccer">Mini Soccer</option>
        <option value="Badminton">Badminton</option>
        <option value="Basket">Basket</option>
      </select>
    </div>
    <div class="col-8">
      <div class="mb-3">
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="cari...." name="cari">
      </div>
    </div>
  </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col d-flex">
          @foreach ($data as $item)
          <div class="card bg-dark text-white" style="width: 15rem; margin:2px">
            <img src="/order/{{$item->poto}}" class="card-img" alt="..." style="filter: brightness(60%);">
            <div class="card-img-overlay text-center">
              <h5 style="color: white; margin-top:2px">{{$item->vendor}}</h5>
              <h6 style="color: white; margin-top:2px">{{$item->kategori}}</h6>
              <p class="card-text mt-2">Rp.{{$item->harga}}</p>
              <a href="/user/detail-post/{{$item->id}}" class="btn btn-primary mt-2">Detail</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    
</div>
@endsection