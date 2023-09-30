@extends('layouts.layoutBefore')

@section('content')
<section>
    <section>
        <div class="page-header min-vh-75">
          <div class="container">
            <div class="row">
              <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                <div class="card card-plain mt-8">
                  <div class="card-header pb-0 text-left bg-transparent">
                    <h3 class="font-weight-bolder text-info text-gradient">Selamat Datang</h3>
                    <p class="mb-0">Silahkan daftar untuk berselancar</p>
                  </div>
                  <div class="card-body">
                    {{-- @if (session('message'))
                    <div class="alert alert-danger" role="alert">
                      {{session('message')}}
                    </div>
                    @endif --}}
                      <form method="POST" action="{{ route('register') }}">
                          @csrf
                          <label for="">Nama</label>
                          <div class="mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                      <label>Email</label>
                      <div class="mb-3">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
  
                                  @error('email')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                      </div>
                      <label for="">Password</label>
                      <div class="mb-3">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
  
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                      </div>
                      <label for="">Password Confirm</label>
                      <div class="mb-3">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign up</button>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                      Sudah punya akun?
                      <a href="/login" class="text-info text-gradient font-weight-bold">Sign in</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                  <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved6.jpg')"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
