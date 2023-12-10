@extends('layout.app')

@section('content')

<div class='container-fluid'>
    <div class="row">
        <div class="col-lg-5 d-lg-block d-none px-0">
            <img src="{{asset('img/auth/banner-auth.png')}}" class="stickyImg" alt="" />
        </div>
        <div class="col-lg-5 col-12 mx-lg-4 mx-0 mb-4">
            <div class="mt-5 me-lg-5 me-0 pe-lg-4 pe-0">
                <div class="">
                    <a href="/" class='text-decoration-none text-dark d-flex align-items-center' >
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fillRule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg> <span class="ms-1 fs-sm">Beranda</span></a>
                    <div class="mt-4">
                        <h4 class='fw-600'>Registrasi Akun</h4>
                        <p class='fs-sm text-gray'>Hi, Silahkan buat akun terlebih dahulu</p>
                    </div>

                    <form method="POST" action="/auth/register">
                        @csrf
                        
                        <div class="mt-4 pt-2 ">

                            <div class="mb-3">
                                <label class="mb-2 fs-sm opacity-75">Email</label>
                                <input type="email" name="email" required id="" value="{{old('email')}}" placeholder="Email" class='form-control text-gray' />
                                @error('email')<p class="mb-0 fs-s-sm text-danger mt-2">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 fs-sm opacity-75">Nama</label>
                                <input type="text" name="name" required id="" placeholder="Nama" value="{{old('name')}}" class='form-control text-gray' />
                                @error('name')<p class="mb-0 fs-s-sm text-danger mt-2">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 fs-sm opacity-75">Password</label>
                                <input type="password" name="password" required id="" placeholder="******" class='form-control text-gray' />
                                @error('password')<p class="mb-0 fs-s-sm text-danger mt-2">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 fs-sm opacity-75">Confirm Password</label>
                                <input type="password" name="password_confirmation" required id="" placeholder="******" class='form-control text-gray' />
                                @error('password_confirmation')<p class="mb-0 fs-s-sm text-danger mt-2">{{$message}}</p>@enderror
                            </div>
                        </div>

                        <div class="mt-5">
                            <button class="btn btn-primary btn-submit border-0 fw-500 w-100 rounded-pill">Submit</button>
                        </div>
                    </form>

                    <div class="mt-4 text-center">
                        <p class='text-gray fs-sm'>Sudah Punya Akun? <a href="/auth/login" class="text-decoration-none text-primary">Masuk</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('javascript')
    <script>
        $('.navbar.main').hide();
    </script>
@endpush



