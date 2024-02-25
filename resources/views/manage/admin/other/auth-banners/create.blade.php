@extends('layout.main')
@section('active-other', 'text-primary')
@section('active-banner-show', 'show')
@section('active-content-banner', 'text-primary')

@section('content')
    <div id="app" class="mb-3">
        <div class="row">
            <div class="col-12 p-3">
                <div class="card border-0 rounded-1">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-4 col-9 pe-0">
                                <div class="d-flex align-items-center">
                                    <a href="/panel/background/auth" class="btn btn-primary border-0 rounded-1"><i class="bi bi-chevron-left"></i></a>
                                    <p class="mb-0 fs-5 ms-4 fw-500">Banner</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <form action="/panel/background/auth/create" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-5 col-12 ps-3 pe-md-0 pe-3 order-md-0 order-1 mt-md-0 mt-3">

                    <div class="card border-0 rounded-1">
                        <div class="card-body">
                            <div class="mb-4 position-relative">
                                <p class="text-gray mb-2 fw-500">File Banner</p>
                                <input type="file" name="photo" required id="square_thumbnail" class="form-control" >
                                <p class="fs-sm text-gray mt-2 mb-0">Gambar harus kurang dari 1 MB. <br>. Hanya file JPG, JPEG,dan PNG <br>  yang diizinkan.</p>
                                @error('photo')<p class="fs-s-sm text-danger mt-2 mb-0">{{$message}}</p>@enderror
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary rounded-1 px-3 py-2 border-0 fs-sm " id="btnSubmitGenre">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-7 col-12 ps-3 pe-3 order-md-1 order-0 ">

                    <div class="card border-0 rounded-1">
                        <div class="card-body">
                            <div class="position-relative">
                                <p class="text-gray mb-2 fw-500">Preview</p>
                                <div class="banner_thumbnail_show">
                                    <img src="" width="100%" height="100%" alt="banner" class="imagePreview d-none">
                                </div>
                         
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

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

  
        $('#square_thumbnail').on('change', function () {

        let fileInput = document.getElementById('square_thumbnail');
        let file = fileInput.files[0];
        const preview = $('.banner_thumbnail_show .imagePreview');

        if (file && file.size > (1024 * 1024)) { 
            fileInput.value = '';
            preview.addClass('d-none')
            preview.attr('src', '');
            $('#alertModal').modal('show')
            $('#alertModal .modal-content p').html('Tidak dapat mengunggah file lebih dari 1MB')
        }else {
            let data = new FormData();
            data.append('file', file);

            axios.post('/panel/admin/getvalidationimage',data).then(function (response) {
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

        $('#btnSubmitGenre').click(function() {
            var fileInput = $('#square_thumbnail')[0];

            if (fileInput.files.length === 0) {
                $('#alertModal').modal('show');
                $('#alertModal .modal-content p').html('File gambar tidak boleh kosong!');
                return false;
            }

            $(this).attr('disabled', 'disabled');
            $(this).closest('form').submit();
        });


// end image 


    </script>
@endpush

