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
                        <h4 class='fw-600'>Log In Akun</h4>
                        <p class='fs-sm text-gray'>Hi, Silahkan masuk terlebih dahulu</p>
                    </div>

                    <form method="POST" action="/auth/login">
                        @csrf

                        <div class="mt-4 pt-2 ">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                                    </svg>
                                    @foreach ($errors->keys() as $key)
                                        <p class="d-flex mb-0 ms-4 fs-sm">{{ $errors->first($key) }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mb-4 pb-1">
                                <label class="mb-2 fs-sm opacity-75">Email</label>
                                <input type="email" name="email" id="" value="{{old('email')}}" required placeholder="Email" class='form-control text-gray' />
                                @error('email')<p class="mb-0 fs-s-sm text-danger mt-2">Email anda salah!</p>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="mb-2 fs-sm opacity-75">Password</label>
                                <input type="password" name="password" id="" required placeholder="******" class='form-control text-gray' />
                                @error('password')<p class="mb-0 fs-s-sm text-danger mt-2">Password anda salah!</p>@enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <div class="form-check d-flex align-content-center">
                                    <input class="form-check-input" type="checkbox" value="1" id="rememberMe"/>
                                    <label class="form-check-label fs-sm mt-1 ms-2 text-gray" for="rememberMe">
                                        Ingat Saya
                                    </label>
                                </div>
                            </div>
                            <div class="">
                                <a href="/auth/register" class='text-decoration-none text-primary fs-sm'>Lupa Password</a>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button class="btn btn-primary btn-submit border-0 fw-500 w-100 rounded-pill">Masuk</button>
                        </div>
                    </form>

                    <div class="mt-4 text-center">
                        <p class='text-gray fs-sm'>Belum Punya Akun? <a href="/auth/register" class="text-decoration-none text-primary">Daftar</a></p>
                        <p class="label-auth mt-4 position-relative fs-s-sm text-gray">Atau Daftar Menggunakan</p>
                        {{-- <div class="">
                            <a href="" class="d-block  w-100 bg-dark py-3 text-decoration-none rounded-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                  </svg> <span class="ms-2 fw-600">Google</span>
                            </a>
                        </div> --}}
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



