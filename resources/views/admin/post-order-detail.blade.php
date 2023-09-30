@extends('layouts.app')
@section('content')
@if (session('msg'))
{ <script>
  Swal.fire({
  icon: 'success',
  title: 'Post order',
  text: '{{session('msg')}}'
})
  </script> }
  @endif
@error('kategori')
<div class="alert alert-danger" role="alert">
  {{$message}}
</div>
@enderror
@error('harga')
<div class="alert alert-danger" role="alert">
  {{$message}}
</div>
@enderror
@error('deskripsi')
<div class="alert alert-danger" role="alert">
{{$message}}
</div>
@enderror
<div class="card mt-3">
    <img src="/order/{{$data->poto}}" class="card-img-top" alt="post-order-poto" style="width: 100%; height: auto;">
    <div class="card-body">
      <h5 class="card-title">{{$data->kategori}}</h5>
      <span class="text-muted">Rp.{{$data->harga}}/jam</span>
      <p class="card-text">{{$data->deskripsi}}</p>
      <p class="card-text"><small class="text-muted">{{$data->created_at}}</small></p>
    </div>
    <div class="card-footer">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Update post order
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/admin/post-order/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori">
                        <option selected value="{{$data->kategori}}">{{$data->kategori}}</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Mini Soccer">Mini Soccer</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Basket">Basket</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="exampleFormControlInput1" value="{{$data->harga}}" name="harga">
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi">{{$data->deskripsi}}</textarea>                    
                  </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
@endsection