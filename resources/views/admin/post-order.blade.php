@extends('layouts.app')
@section('content')
  <div class="row my-4">
    <div>
      @if (session('msg'))
      { <script>
        Swal.fire({
        icon: 'success',
        title: 'Post order',
        text: '{{session('msg')}}'
      })
        </script> }
        @endif
       @if (session('del'))
      { <script>
        Swal.fire({
        icon: 'success',
        title: 'Post order',
        text: '{{session('del')}}'
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
          @error('poto')
          <div class="alert alert-danger" role="alert">
            {{$message}}
          </div>
          @enderror
          @error('deskripsi')
                <div class="alert alert-danger" role="alert">
                  {{$message}}
                </div>
            @enderror
      <div class="card">
        <div class="card-header pb-0">
          <div class="row" style="justify-content: space-between">
            <div style="justify-content: space-between; display:flex">
                <h6>Data Post Order</h6>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Unggah Order
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Unggah Order</h5>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    <option>Pilih Salah satu</option>
                                    <option value="Futsal">Futsal</option>
                                    <option value="Mini Soccer">Mini Soccer</option>
                                    <option value="Badminton">Badminton</option>
                                    <option value="Basket">Basket</option>
                                  </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="120.000" name="harga">
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Unggah Poto</label>
                                <input type="file" class="form-control" id="exampleFormControlInput1" name="poto">
                                
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
                                
                              </div>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th class="text-center">Kategori</th>
                  <th class="text-center">Harga</th>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                <tr>
                  <td class="text-center">{{$item->kategori}}</td>
                  <td class="text-center">{{$item->harga}}</td>
                  <td class="text-center">{{$item->created_at}}</td>
                  <td class="text-center">
                    <div class="d-flex" style="justify-content: center">
                      <a href="/admin/post-order/detail/{{$item->id}}" style="margin: 2px"><i class="fa fa-eye btn btn-outline-primary btn-sm" aria-hidden="true"></i></a>
                      <form action="/admin/post-order/delete/{{$item->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger btn-sm" type='submit' style="margin: 2px"><i class="fa fa-trash" aria-hidden="true"></i></button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection