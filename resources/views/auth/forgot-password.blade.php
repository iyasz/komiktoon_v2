@extends('layout.auth')

@push('css')
    <style>
        .tatsumaki {
            position: absolute;
            right: 90px;
            top: 40px;    
        }

        .monster {
            position: absolute;
            top: 0;
            bottom: 0;
            left: -200px;
            overflow: hidden;
            z-index: -1;
        }

        .circle{
            width: 13px;
            height: 13px;
            background-color: #454545;
            border-radius: 50%;
            margin-left: 15px;
            animation: moveRight 1s linear infinite;
            margin-bottom: 20px
        }

        .cirle-2 {
            animation-delay: -0.2s;
        }

        .cirle-3 {
            animation-delay: -0.4s;
        }

        @keyframes moveRight {
            0% {
                transform: translateY(5px);
            }
            25% {
                transform: translateY(10px);
            }
            50% {
                transform: translateY(15px);
            }
            75% {
                transform: translateY(10px);
            }
            100% {
                transform: translateY(5px);
            }
        }
    </style>
@endpush

@section('content')

<div class="tatsumaki d-lg-block d-none">
    <img src="https://i.ibb.co/93rFWxc/IMG-20231210-202242.png" width="190px" alt="">
</div>

<div class="monster d-lg-block d-none">
    <img src="https://i.ibb.co/0Zrf2jx/IMG-20231210-210047.png" width="820px"  alt="">
</div>

<div class='container-fluid'>
    <div class="row justify-content-center">

        <div class="col-lg-4 col-12 mx-lg-4 mx-0 mb-4">
            <div class="mt-5 ">
                <div class="">
                    <a href="/auth/login" class='text-decoration-none text-dark d-flex align-items-center' >
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fillRule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg> <span class="ms-1 fs-sm">Kembali</span></a>
                    <div class="mt-4 text-center">
                        <h2 class='fw-600'>Lupa Kata Sandi</h2>
                        <p class='fs-sm text-gray'>Lupa kata sandi? Reset Kata Sandimu Sekarang</p>
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
                            <div class="mb-4 d-flex align-items-center position-relative">
                                <img src="https://i.ibb.co/YDwCLzg/New-Project-130-FB3-EC38.png" width="180px" class="ms-4" alt="">
                                <div class="d-flex ms-3">
                                    <div class="circle cirle-1"></div>
                                    <div class="circle cirle-2"></div>
                                    <div class="circle cirle-3"></div>
                                </div>
                            </div>

                            <div class="mb-4 pb-1">
                                <label class="mb-2 fs-sm opacity-75">Email</label>
                                <input type="email" name="email" required placeholder="Masukkan Email" class='form-control text-gray' />
                                @error('email')<p class="mb-0 fs-s-sm text-danger mt-2">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="mt-5">
                            <button class="btn btn-primary btn-submit border-0 fw-500 w-100 rounded-pill">Submit</button>
                        </div>
                    </form>

                    <div class="mt-4 text-center">
                        <p class='text-gray fs-sm'>Sudah Ingat Password? <a href="/auth/login" class="text-decoration-none text-primary">Masuk</a></p>
                        {{-- <p class="label-auth mt-4 position-relative fs-s-sm text-gray">Atau Masuk Menggunakan</p>
                        <div class="mt-4">
                            <a href="{{route('google.redirect')}}" class="bg-white border d-inline-flex justify-content-center align-items-center w-100 py-3 text-decoration-none rounded-1">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 48 48" class="LgbsSe-Bz112c"><g><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path><path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path><path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path><path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path><path fill="none" d="M0 0h48v48H0z"></path></g></svg> <span class="ms-3 fw-600 text-dark">Google</span>
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



