@extends('layout.auth')
@section('title', 'Confirm Password')

@section('content')

<div class='container-fluid'>
    <div class="row justify-content-center">

        <div class="col-lg-4 col-12 mx-lg-4 mx-0 mb-4">
            <div class="mt-5 ">
                <div class="">
                    <div class="mt-4 text-center">
                        <h2 class='fw-600'>Buat Kata Sandi</h2>
                        <p class='fs-sm text-gray'>Buat kata sandi untuk akun anda</p>
                    </div>

                    <form method="POST" action="/auth/register/mC3EtY3yxkqyyAqRnjKeDguCf/{{$token}}">
                        @csrf
                        @method('put')

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




