@extends('layout.contribute')
@section('content-active', 'text-primary')

@section('content')
    <div id="app">
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
                                    <p class="ms-md-3 ms-0 fw-400 mt-3 fs-6 text-primary">SERIAL</p>
                                </div>
                                <div class="position-relative d-md-block d-none">
                                    <div class="bar-chapter"></div>
                                </div>
                                <p class="mb-0 d-md-none d-flex align-items-center opacity-50 ">/</p>
                                <div class="d-flex align-items-center mx-5">
                                    <div class="stepper d-md-block d-none">
                                        <h4 class="mb-0">2</h4>
                                    </div>
                                    <p class="ms-md-3 ms-0 fw-400 mt-3 fs-6">CHAPTER</p>
                                </div>

                            </div>
                        </div>
                        <hr class="mx-lg-5 mx-2">
                        <form action="/contribute/content" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row mt-5">
                                <div class="col-lg-8 col-12 order-lg-0 order-1">
                                    <div class="mb-4 position-relative max-input-group">
                                        <p class="text-gray mb-2 fw-500">Nama Author</p>
                                        <input type="text" id="author-name" name="author" data-max-num="50" required value="{{Auth::user()->name}}" placeholder="Kurang dari 50 huruf" class="form-control fs-sm pe-10">
                                        @error('author')<p class="fs-s-sm text-danger mt-2 mb-0">{{$message}}</p>@enderror
                                        <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                            <span class="fw-500 current-text-count">0</span>
                                            <span>/ 50</span>
                                        </div>
                                    </div>
                                    <div class="mb-4 position-relative max-input-group">
                                        <p class="text-gray mb-2 fw-500">Judul Serial</p>
                                        <input type="text" id="serial-title" value="{{old('title')}}" name="title" data-max-num="50" required placeholder="Kurang dari 50 huruf" class="form-control fs-sm pe-10">
                                        @error('title')<p class="fs-s-sm text-danger mt-2 mb-0">{{$message}}</p>@enderror
                                        <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                            <span class="fw-500 current-text-count">0</span>
                                            <span>/ 50</span>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-gray mb-2 fw-500">Genre <span class="fs-s-sm opacity-50">(3 Pilihan)</span></p>
                                        <div class="row">
                                            @foreach($genre as $data)
                                                <div class="col-auto mb-2">
                                                    <div class="form-check genre">
                                                        <input class="form-check-input genre" type="checkbox" name="radioGenre[]" id="radio-genre{{$loop->iteration}}" value="{{$data->id}}" @if(is_array(old('radioGenre')) && in_array($data->id, old('radioGenre'))) checked @endif>
                                                        <label class="fs-sm text-gray" for="radio-genre{{$loop->iteration}}">{{ucfirst($data->name)}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @error('radioGenre')<p class="fs-s-sm text-danger mt-2 mb-0">{{$message}}</p>@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4 position-relative max-input-group">
                                        <p class="text-gray mb-2 fw-500">Sinopsis</p>
                                        <textarea name="synopsis" data-max-num="500" id="serial-synopsis" cols="10" rows="8" required class="form-control fs-sm pe-10" placeholder="Kurang dari 500 huruf">{{old('synopsis')}}</textarea>
                                        @error('synopsis')<p class="fs-s-sm text-danger mt-2 mb-0">{{$message}}</p>@enderror
                                        <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                            <span class="fw-500 current-text-count">0</span>
                                            <span>/ 500</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 order-lg-1 order-0">
                                    <div class="mb-3">
                                        <p class="fw-500 mb-2 text-gray">Thumbnail Persegi </p>
                                        <input type="file" name="thumbnail" id="square_thumbnail" class="d-none" >
                                        <div class="square_thumbnail_show @error('thumbnail') border-primary @enderror">
                                            <img src="" alt="banner" class="imagePreview d-none">
                                            <div class="text-center">
                                                <i class="bi bi-cloud-arrow-up fs-1 @error('thumbnail') text-danger @enderror opacity-50"></i>
                                                <p class="fs-sm opacity-75 @error('thumbnail') text-danger @enderror">Pilih gambar untuk diunggah disini.</p>
                                            </div>
                                        </div>
                                        @error('thumbnail')<p class="fs-s-sm text-danger mt-2 mb-0">{{$message}}</p>@enderror
                                    </div>
                                    <p class="fs-sm text-gray">Gambar harus lebih besar dari <br> 840x840 pixel dan berukuran <br> kurang dari 500KB. Hanya file <br> JPG, JPEG, dan PNG yang bisa.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" value="1" type="checkbox" @if(old('confirm_copyright') == 1) checked @endif name="confirm_copyright" id="yes_confirm_copyright">
                                        <label class=" fs-sm text-gray" for="yes_confirm_copyright">
                                            Saya mengkonfirmasi bahwa Komikku ini adalah <span class="text-primary">ciptaan saya</span> dan <span class="text-primary">milik saya.</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="1" type="checkbox" @if(old('confirm_contract') == 1) checked @endif name="confirm_contract" id="yes_confirm_contract">
                                        <label class=" fs-sm text-gray" for="yes_confirm_contract">
                                            Saya setuju dengan <a href="/contribute/contract" class="text-primary">kebijakan kontrak</a> dari Komiktoon.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary draft border-0 rounded-1 px-4 py-3 disabled">Buat Draft <i class="bi bi-chevron-right"></i></button>
                                </div>
                            </div>
                        </form>
                        
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

        // image 

        $('.square_thumbnail_show').on('click', function(){
            $('#square_thumbnail').click()
        })

        $('#square_thumbnail').on('change', function () {

            let fileInput = document.getElementById('square_thumbnail');
            let file = fileInput.files[0];
            const preview = $('.square_thumbnail_show .imagePreview');

            if (file && file.size > (500 * 1024)) { 
                fileInput.value = '';
                preview.addClass('d-none')
                preview.attr('src', '');
                $('#alertModal').modal('show')
                $('#alertModal .modal-content p').html('Tidak dapat mengunggah file lebih dari 500KB')
            }else {
                let data = new FormData();
                data.append('file', file);

                axios.post('/contribute/content/create',data).then(function (response) {
                    if(response.data.error){
                        fileInput.value = '';
                        preview.addClass('d-none')
                        preview.attr('src', '');
                        $('#alertModal').modal('show')
                        $('#alertModal .modal-content p').html(response.data.error)
                    }else{
                        const input = document.getElementById('square_thumbnail');
                        const file = input.files[0];
            
                        if (file) {
                            const reader = new FileReader();
            
                            preview.removeClass('d-none');
                            reader.onload = function (e) {
                                preview.attr('src', e.target.result);
                            };
            
                            reader.readAsDataURL(file);
                        } else {
                            preview.addClass('d-none')
                            preview.attr('src', '');
                        }
                    }
                });

            }

        });

        // end image 

        // genre max
        
        $('.form-check-input.genre').on('change', function(e) {
            if ($('.form-check-input.genre:checked').length > 3) {
                this.checked = false;
            }
        });

        // end genre max 

        // max word 
        $(document).ready(function () {
            
            $('#author-name, #serial-title, #serial-synopsis').on('input', function () {
                var maxDataNumber = $(this).attr('data-max-num');
                var inputText = $(this).val();

                if (inputText.length > maxDataNumber) {
                    var trimmedText = inputText.substring(0, maxDataNumber);
                    $(this).val(trimmedText);
                }

                $(this).closest('.max-input-group').find('.current-text-count').text($(this).val().length);
            });

            $('#author-name, #serial-title, #serial-synopsis').each(function () {
                var maxDataNumber = $(this).attr('data-max-num');
                var inputText = $(this).val();
                $(this).closest('.max-input-group').find('.current-text-count').text(inputText.length);
            });

        });

        // end max word 

        // confirm contract and copyright 

        $(document).ready(function () {
            updateButtonStatus();
            $('#yes_confirm_copyright, #yes_confirm_contract').on('change', function () {
                updateButtonStatus();
            });

        });

        function updateButtonStatus() {
            var isBothChecked = $('#yes_confirm_copyright').prop('checked') && $('#yes_confirm_contract').prop('checked');
            $('.btn.btn-primary.draft').toggleClass('disabled', !isBothChecked);
        }

        // end confirm contract and copyright 

        // submit validasi 

        $('.btn.btn-primary.draft').click(function() {
            var fileInput = $('#square_thumbnail')[0];
            var genreChecked = $('.form-check-input.genre:checked').length;

            if (genreChecked === 0 || fileInput.files.length === 0) {
                var errorMessage = genreChecked === 0 ? 'Genre tidak boleh kosong!' : 'File gambar tidak boleh kosong!';
                $('#alertModal').modal('show');
                $('#alertModal .modal-content p').html(errorMessage);
                return false;
            }

            $(this).attr('disabled', 'disabled');
            $(this).closest('form').submit();
        });


        // end submit validasi 


    </script>
@endpush



