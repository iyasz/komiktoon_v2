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
        <div class="row">

            <div class="col-lg-12 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body wrapper-confirm">
                        <div class="header-input-bg-banner" style="background-image: url({{Storage::url($content->bg_banner)}})">
                            <div class="banner-preview">

                            </div>
                            <div class="char-preview text-center">
                                <img src="{{Storage::url($content->banner)}}" alt="">
                            </div>
                        </div>
                        <div class="container">
                            <div class="body_confirm_detail">
                                <form action="/contribute/content/{{$content->slug}}/banner/edit" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('put')
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-12 px-md-4 px-3">
                                            <hr>
                                            <div class="mb-4">
                                                <p class="text-gray mb-2 fw-500">Status </p>
                                                <select name="is_ongoing" required id="" class="form-control fs-sm">
                                                    <option selected disabled></option>
                                                    <option {{ $content->is_ongoing == 1 ? 'selected' : '' }} value="1">Berlangsung</option>
                                                    <option {{ $content->is_ongoing == 2 ? 'selected' : '' }} value="2">Tamat</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <p class="text-gray mb-2 fw-500">Update Day 1 <span class="fs-s-sm opacity-50">(Wajib)</span></p>
                                                <select name="update_day" required id="select-update-day" class="form-control fs-sm">
                                                    <option {{ $content->update_day == 1 ? 'selected' : '' }} value="1">Senin</option>
                                                    <option {{ $content->update_day == 2 ? 'selected' : '' }} value="2">Selasa</option>
                                                    <option {{ $content->update_day == 3 ? 'selected' : '' }} value="3">Rabu</option>
                                                    <option {{ $content->update_day == 4 ? 'selected' : '' }} value="4">Kamis</option>
                                                    <option {{ $content->update_day == 5 ? 'selected' : '' }} value="5">Jum'at</option>
                                                    <option {{ $content->update_day == 6 ? 'selected' : '' }} value="6">Sabtu</option>
                                                    <option {{ $content->update_day == 7 ? 'selected' : '' }} value="7">Minggu</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <p class="text-gray mb-2 fw-500">Update Day 2 <span class="fs-s-sm opacity-50">(Optional)</span></p>
                                                <select name="update_day_2" id="select-update-day-2" class="form-control fs-sm">
                                                    <option {{ $content->update_day_2 == 1 ? 'selected' : '' }} value="1">Senin</option>
                                                    <option {{ $content->update_day_2 == 2 ? 'selected' : '' }} value="2">Selasa</option>
                                                    <option {{ $content->update_day_2 == 3 ? 'selected' : '' }} value="3">Rabu</option>
                                                    <option {{ $content->update_day_2 == 4 ? 'selected' : '' }} value="4">Kamis</option>
                                                    <option {{ $content->update_day_2 == 5 ? 'selected' : '' }} value="5">Jum'at</option>
                                                    <option {{ $content->update_day_2 == 6 ? 'selected' : '' }} value="6">Sabtu</option>
                                                    <option {{ $content->update_day_2 == 7 ? 'selected' : '' }} value="7">Minggu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 ">
                                            <div class="bg_banner mt-3">
                                                <hr>
                                                <div class="mb-4">
                                                    <p class="text-gray mb-2 fw-500">Background Banner</p>
                                                    <input type="file" name="bg_banner" id="bg_banner_select" class="form-control fs-sm">
                                                    <p class="mb-0 mt-2 fs-sm text-gray">Gambar harus lebih besar dari 1920x320 pixel dan berukuran kurang dari 2MB. Hanya file JPG, JPEG, dan PNG yang bisa.</p>
                                                </div>
                                                <div class="mb-4">
                                                    <p class="text-gray mb-2 fw-500">Character</p>
                                                    <input type="file" name="banner" id="banner_select" class="form-control fs-sm">
                                                    <p class="mb-0 mt-2 fs-sm text-gray">Gambar harus lebih besar dari 1200x240 pixel dan berukuran kurang dari 2MB. Hanya file PNG yang bisa.</p>
                                                </div>
                                            </div>
                                            <div class="text-end mb-3">
                                                <button class="btn btn-primary border-0 rounded-1 fs-sm">Update Sekarang</button>
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
        $(document).ready(function(){
            var updateDay = $('#select-update-day').val();
            var updateDay2 = $('#select-update-day-2').val();

            $('#select-update-day option[value="' + updateDay2 + '"]').prop('disabled', true);
            $('#select-update-day-2 option[value="' + updateDay + '"]').prop('disabled', true);

            $('#select-update-day').change(function(){
                var selectedDay = $(this).val(); 
                
                $('#select-update-day-2 option').prop('disabled', false); 
                if(selectedDay !== '') {
                    $('#select-update-day-2 option[value="' + selectedDay + '"]').prop('disabled', true);
                }
            });

            $('#select-update-day-2').change(function(){
                var selectedDay2 = $(this).val();
                
                $('#select-update-day option').prop('disabled', false);
                if(selectedDay2 !== '') {
                    $('#select-update-day option[value="' + selectedDay2 + '"]').prop('disabled', true);
                }
            });

        });

        $('#bg_banner_select').on('change', function() {

            let fileInput = document.getElementById('bg_banner_select');
            let file = fileInput.files[0];
            const preview = $('.header-input-bg-banner');

            if (file && file.size > (2048 * 1024)) {
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

