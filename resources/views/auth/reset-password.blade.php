@extends('layout.auth')
@section('title', 'Reset Password')

@push('css')
    <style>
        .alert.alert-danger{
            transform: translateY(-110%);
            justify-content: center;
            animation: slideInDown 5s ease-in-out;
        }

        @keyframes slideInDown {
            0% {
                transform: translateY(-100%);
            }
            20% {
                transform: translateY(0);
            }
            80% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-100%);
            }
        }

    </style>
@endpush

@section('content')

@error('error_messages')
<div class="alert alert-danger w-100 position-fixed top-0 left-0 right-0 shadow-sm justify-content-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
    </svg>
    <p class="mb-0 ms-3 fs-sm">{{ $message }}</p>
</div>
@enderror

<div class='container-fluid'>
    <div class="row justify-content-center">

        <div class="col-lg-4 col-12 mx-lg-4 mx-0 mb-4">
            <div class="mt-5 ">
                <div class="">
                    <div class="mt-4 text-center">
                        <h2 class='fw-600'>Reset Kata Sandi</h2>
                        <p class='fs-sm text-gray'>Reset kata sandi untuk akun anda</p>
                    </div>

                    <form method="POST" action="/auth/reset-password/X35k5FaLl/{{$token}}">
                        @csrf

                        <div class="mt-4 pt-2 ">

                            <div class="mb-4 d-flex align-items-center position-relative">
                                <img src="https://i.ibb.co/YDwCLzg/New-Project-130-FB3-EC38.png" width="180px" class="ms-4" alt="">
                                <div class="d-flex ms-3">
                                    <div class="circle cirle-1"></div>
                                    <div class="circle cirle-2"></div>
                                    <div class="circle cirle-3"></div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="hidden" name="token" id="" class="form-control" value="{{request()->token}}">
                                <input type="hidden" name="email" id="" class="form-control" value="{{request()->email}}">
                                <label class="mb-2 fs-sm opacity-75">Password</label>
                                <input type="password" name="password" required placeholder="Password" class='form-control text-gray' />
                                @error('password')<p class="mb-0 fs-s-sm text-danger mt-2">{{$message}}</p>@enderror
                            </div>
                            <div class="mb-4">
                                <label class="mb-2 fs-sm opacity-75">Confirm Password</label>
                                <input type="password" name="password_confirmation" required placeholder="Confirm Password" class='form-control text-gray' />
                                @error('password_confirmation')<p class="mb-0 fs-s-sm text-danger mt-2">{{$message}}</p>@enderror
                            </div>
                        </div>
                        <div class="mt-5">
                            <button class="btn btn-primary btn-submit border-0 fw-500 w-100 rounded-pill">Submit</button>
                        </div>
                    </form>

                    <div class="mt-4 text-center">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('javascript')
    <script>
        $('form').on('submit', function(){
            $('.btn.btn-primary').addClass('disabled')
        })

    </script>
@endpush



