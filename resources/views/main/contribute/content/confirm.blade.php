@extends('layout.contribute')
@section('content-active', 'text-primary')

@push('css')
    <style>
        @media only screen and (max-width: 575px) {
            .header-input-bg-banner .char-preview img {
                width: 90% !important;
                height: 65px !important;
            }

            .header-input-bg-banner {
                height: 100px !important;
            }

        }

    </style>
@endpush

@section('content')
    <div id="app">
        {{-- <div class="wrapper-banner-content" style="background-image: url('{{ asset('img/bg-detail.png') }}');">
            <div class="detail_content position-relative">
                <div class="thumb">
                    <img src="{{ asset('img/people.png') }}" alt="" class="d-lg-block d-none" width="100%" height="250">
                </div>
                <div class="info text-center">
                    <p class="genre mb-0">
                        {{ $content->genreDetail->pluck('genre.name')->implode(', ') }}
                    </p>
                    <h1 class="title text-white">{{ $content->title }}</h1>
                    <p class="creator mb-0 text-white">{{ $content->author }} <a data-bs-toggle="modal" data-bs-target="#modalInfo" class="text-white ms-1 d-md-inline d-none"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"> <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" /> </svg></a></p>
                </div>
            </div>
        </div> --}}
        <div class="row">

            <div class="col-lg-12 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body wrapper-confirm">
                        <div class="header-input-bg-banner" style="background-image: url({{asset('img/bg_banner_ex.png')}})">
                            <div class="banner-preview">

                            </div>
                            <div class="char-preview text-center">
                                <img src="{{asset('img/char_banner_ex.png')}}" alt="">
                            </div>
                        </div>
                        <div class="container">
                            <div class="body_confirm_detail">
                                <form action="/contribute/content/update/{{$content->slug}}/insert" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 px-md-4 px-3">
                                            <hr>
                                            <div class="mb-4">
                                                <p class="text-gray mb-2 fw-500">Status </p>
                                                <select name="" required id="" class="form-control fs-sm">
                                                    <option selected disabled></option>
                                                    <option value="1">Berlangsung</option>
                                                    <option value="2">Tamat</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <p class="text-gray mb-2 fw-500">Update Day 1 <span class="fs-s-sm opacity-50">(Wajib)</span></p>
                                                <select name="update_day" required id="" class="form-control fs-sm">
                                                    <option selected disabled></option>
                                                    <option value="0">Senin</option>
                                                    <option value="1">Selasa</option>
                                                    <option value="2">Rabu</option>
                                                    <option value="3">Kamis</option>
                                                    <option value="4">Jum'at</option>
                                                    <option value="5">Sabtu</option>
                                                    <option value="6">Minggu</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <p class="text-gray mb-2 fw-500">Update Day 2 <span class="fs-s-sm opacity-50">(Optional)</span></p>
                                                <select name="update_day_2" id="" class="form-control fs-sm">
                                                    <option selected disabled></option>
                                                    <option value="0">Senin</option>
                                                    <option value="1">Selasa</option>
                                                    <option value="2">Rabu</option>
                                                    <option value="3">Kamis</option>
                                                    <option value="4">Jum'at</option>
                                                    <option value="5">Sabtu</option>
                                                    <option value="6">Minggu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 ">
                                            <div class="bg_banner mt-3">
                                                <hr>
                                                <div class="mb-4">
                                                    <p class="text-gray mb-2 fw-500">Background Banner</p>
                                                    <input type="file" name="bg_banner" id="bg_banner_select" required class="form-control fs-sm">
                                                    <p class="mb-0 mt-2 fs-sm text-gray">Gambar harus lebih besar dari 1920x320 pixel dan berukuran kurang dari 1MB. Hanya file JPG, JPEG, dan PNG yang bisa.</p>
                                                </div>
                                                <div class="mb-4">
                                                    <p class="text-gray mb-2 fw-500">Character</p>
                                                    <input type="file" name="banner" id="banner_select" required class="form-control fs-sm">
                                                    <p class="mb-0 mt-2 fs-sm text-gray">Gambar harus lebih besar dari 1200x240 pixel dan berukuran kurang dari 1MB. Hanya file PNG yang bisa.</p>
                                                </div>
                                            </div>
                                            <div class="text-end mb-3">
                                                <button class="btn btn-primary border-0 rounded-1 fs-sm">Terbitkan Sekarang</button>
                                            </div>
                                            
                                        </div>
                                    </div>  
                                </div>
                            </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal" id="alertModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-0">
            <div class="modal-body py-5">
              <div class="text-center">
                <p class="text-gray"></p>
              </div>
              <div class="d-flex justify-content-center mt-4 mx-3">
                  <button class="btn bg-dark text-white py-3 px-5 border-0 rounded-pill" data-bs-dismiss="modal">YA</button>
                </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@push('javascript')
    <script>
        $('#bg_banner_select').on('change', function() {

            let fileInput = document.getElementById('bg_banner_select');
            let file = fileInput.files[0];
            const preview = $('.header-input-bg-banner');

            if (file && file.size > (1024 * 1024)) {
                fileInput.value = '';
                $('#alertModal').modal('show')
                $('#alertModal .modal-content p').html('Tidak dapat mengunggah file lebih dari 1MB')
            } else {
                let data = new FormData();
                data.append('file', file);
                var slug = location.pathname.split("/")[4];

                axios.post('/contribute/content/update/' + slug, data).then(function(response) {

                    if (response.data.error) {
                        fileInput.value = '';
                        $('#alertModal').modal('show')
                        $('#alertModal .modal-content p').html(response.data.error)
                    } else {
                        const input = document.getElementById('bg_banner_select');
                        const file = input.files[0];

                        if (file) {
                            $('.header-input-bg-banner').css('background-image', 'url(' + URL.createObjectURL(file) + ')');
                        }

                    }
                });
            }

        });

        $('#banner_select').on('change', function() {

            let fileInput = document.getElementById('banner_select');
            let file = fileInput.files[0];
            const preview = $('.header-input-bg-banner .char-preview img');

            if (file && file.size > (1024 * 1024)) {
                fileInput.value = '';
                $('#alertModal').modal('show')
                $('#alertModal .modal-content p').html('Tidak dapat mengunggah file lebih dari 1MB')
            } else {
                let data = new FormData();
                data.append('file', file);
           
                var slug = location.pathname.split("/")[4];

                axios.post('/contribute/content/update/' + slug+'/char', data).then(function(response) {

                    if (response.data.error) {
                        fileInput.value = '';
                        $('#alertModal').modal('show')
                        $('#alertModal .modal-content p').html(response.data.error)
                    } else {
                        const input = document.getElementById('banner_select');
                        const file = input.files[0];

                        if (file) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                preview.attr('src', e.target.result);
                            };

                            reader.readAsDataURL(file);
                        } 
                        
                    }
                });

            }

        });
    </script>
@endpush

