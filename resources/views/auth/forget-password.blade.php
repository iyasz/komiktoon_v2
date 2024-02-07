@extends('layout.auth')
@section('title', 'Forget Password')

@section('content')

    <div class='container-fluid'>
        <div class="row justify-content-center">

            <div class="col-lg-4 col-12 mx-lg-4 mx-0 mb-4">
                <div class="mt-5 ">
                    <div class="">
                        <a href="/auth/login" class='text-decoration-none text-dark d-inline-flex align-items-center'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15" fill="currentColor"
                                class="bi bi-chevron-left" viewBox="0 0 16 16">
                                <path fillRule="evenodd"
                                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                            </svg> <span class="ms-1 fs-sm">Kembali</span></a>
                        <div class="mt-3 text-center">
                            <h2 class='fw-600'>Lupa Kata Sandi</h2>
                            <p class='fs-sm text-gray'>Lupa kata sandi? Reset Kata Sandimu Sekarang</p>
                        </div>

                        <form method="POST" action="/auth/forget-password">
                            @csrf

                            <div class="mt-4 pt-2 ">

                                <div class="mb-4 d-flex align-items-center position-relative justify-content-center">
                                    <img src="{{ asset('img/maskot/mumen_ch.gif') }}" width="180px" class=""
                                        alt="">
                                </div>
                                <div class="mb-4 pb-1">
                                    <label class="mb-2 fs-sm opacity-75">Email</label>
                                    <input type="email" name="email" required placeholder="Masukkan Email"
                                        class='form-control text-gray' />
                                    @error('email')
                                        <p class="mb-0 fs-s-sm text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-5">
                                <button
                                    class="btn btn-primary btn-submit border-0 fw-500 w-100 rounded-pill">Submit</button>
                            </div>
                        </form>

                        <div class="mt-4 text-center">
                            <p class='text-gray fs-sm'>Sudah Ingat Password? <a href="/auth/login"
                                    class="text-decoration-none text-primary">Masuk</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
