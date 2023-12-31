@extends('layout.contribute')

@section('content')
    <div id="app" class="mb-3">
        <div class="row">

            <div class="col-lg-12 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 d-flex justify-content-center">
                                <div class="d-flex align-items-center mx-5">
                                    <div class="stepper active d-md-block d-none">
                                        <h4 class="mb-0">1</h4>
                                    </div>
                                    <p class="ms-3 fw-400 mt-3 fs-6 text-primary">SERIAL</p>
                                </div>
                                <div class="position-relative d-md-block d-none">
                                    <div class="bar-chapter"></div>
                                </div>
                                <p class="mb-0 d-md-none d-flex align-items-center opacity-50 ">/</p>
                                <div class="d-flex align-items-center mx-5">
                                    <div class="stepper d-md-block d-none">
                                        <h4 class="mb-0">2</h4>
                                    </div>
                                    <p class="ms-3 fw-400 mt-3 fs-6">CHAPTER</p>
                                </div>

                            </div>
                        </div>
                        <hr class="mx-lg-5 mx-2">
                        <div class="row mt-5">
                            <div class="col-lg-8 col-12 order-lg-0 order-1">
                                <div class="mb-4 position-relative">
                                    <p class="text-gray mb-2 fw-500">Nama Author</p>
                                    <input type="text" name="" value="{{Auth::user()->name}}" placeholder="Kurang dari 50 huruf" class="form-control fs-sm pe-10">
                                    <div class="text-gray max-input-text fs-sm">
                                        <span class="fw-500">50</span>
                                        <span>/ 50</span>
                                    </div>
                                </div>
                                <div class="mb-4 position-relative">
                                    <p class="text-gray mb-2 fw-500">Judul Serial</p>
                                    <input type="text" name="" placeholder="Kurang dari 50 huruf" class="form-control fs-sm pe-10">
                                    <div class="text-gray max-input-text fs-sm">
                                        <span class="fw-500">50</span>
                                        <span>/ 50</span>
                                    </div>
                                </div>
                                <div class="mb-4 position-relative">
                                    <p class="text-gray mb-2 fw-500">Genre</p>
                                    <div class="row">
                                        @for($i = 0 ; $i < 11 ; $i++)
                                        <div class="col-auto mb-2">
                                            <div class="form-check category">
                                                <input class="form-check-input category" value="Horror" type="checkbox" name="radioCategory[]" id="radio-category">
                                                <label class=" fs-sm text-gray" for="radio-category">
                                                    Kantong
                                                </label>
                                            </div>
                                        </div>
                                        @endfor
                                    </div>
                                </div>
                                
                                <div class="mb-4 position-relative">
                                    <p class="text-gray mb-2 fw-500">Sinopsis</p>
                                    <textarea name="" id="" cols="10" rows="8" class="form-control fs-sm pe-10" placeholder="Kurang dari 500 huruf"></textarea>
                                    <div class="text-gray max-input-text fs-sm">
                                        <span class="fw-500">500</span>
                                        <span>/ 500</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12 order-lg-1 order-0">
                                <div class="mb-3">
                                    <p class="fw-500 mb-2">Thumbnail Persegi </p>
                                    <input type="file" name="" id="square_thumbnail" class="d-none" >
                                    <div class="square_thumbnail_show m-lg-0 m-auto">
                                        <div class="text-center">
                                            <i class="bi bi-cloud-arrow-up fs-1 opacity-50"></i>
                                            <p class="fs-sm">Pilih gambar untuk diunggah <br> Seret gambar dan taruh <br> disini.</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="fs-sm text-gray">Gambar harus lebih besar dari <br> 1080x1080 pixel dan berukuran <br> kurang dari 500kb. Hanya file <br> JPG, JPEG, dan PNG yang berlaku.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" value="Horror" type="checkbox" name="" id="radi">
                                    <label class=" fs-sm text-gray" for="radi">
                                        Saya mengkonfirmasi bahwa Komikku ini adalah <span class="text-primary">ciptaan saya</span> dan <span class="text-primary">milik saya.</span>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Horror" type="checkbox" name="" id="radia">
                                    <label class=" fs-sm text-gray" for="radia">
                                        Saya setuju dengan <a href="" class="text-primary">kebijakan kontrak</a> dari Komiktoon.
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary border-0 rounded-1 px-4 py-3">Buat Draft <i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>



    </div>
@endsection



