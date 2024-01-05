@extends('layout.contribute')

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
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row mt-5">
                                <div class="col-lg-8 col-12 order-lg-0 order-1">
                                    <div class="mb-4 position-relative">
                                        <p class="text-gray mb-2 fw-500">Nama Author</p>
                                        <input type="text" name="" required value="{{Auth::user()->name}}" placeholder="Kurang dari 50 huruf" class="form-control 50 fs-sm pe-10">
                                        <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                            <span class="fw-500" id="charCount">0</span>
                                            <span>/ 50</span>
                                        </div>
                                    </div>
                                    <div class="mb-4 position-relative">
                                        <p class="text-gray mb-2 fw-500">Judul Serial</p>
                                        <input type="text" name="" required placeholder="Kurang dari 50 huruf" class="form-control 50 fs-sm pe-10">
                                        <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                            <span class="fw-500">50</span>
                                            <span>/ 50</span>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-gray mb-2 fw-500">Genre</p>
                                        <div class="row">
                                            @foreach($genre as $data)
                                            <div class="col-auto mb-2">
                                                <div class="form-check category">
                                                    <input class="form-check-input category" value="Horror" type="checkbox" name="radioCategory[]" id="radio-category{{$loop->iteration}}">
                                                    <label class="fs-sm text-gray" for="radio-category{{$loop->iteration}}">
                                                        {{ucfirst($data->name)}}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    
                                    <div class="mb-4 position-relative">
                                        <p class="text-gray mb-2 fw-500">Sinopsis</p>
                                        <textarea name="" id="" cols="10" rows="8" required class="form-control fs-sm pe-10" placeholder="Kurang dari 500 huruf"></textarea>
                                        <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                            <span class="fw-500">500</span>
                                            <span>/ 500</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12 order-lg-1 order-0">
                                    <div class="mb-3">
                                        <p class="fw-500 mb-2 text-gray">Thumbnail Persegi <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-question-circle ms-2" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94"/>
                                        </svg></p>
                                        <input type="file" name="" id="square_thumbnail" class="d-none" >
                                        <div class="square_thumbnail_show">
                                            <img src="" alt="banner" class="imagePreview d-none">
                                            <div class="text-center">
                                                <i class="bi bi-cloud-arrow-up fs-1 opacity-50"></i>
                                                <p class="fs-sm text-gray">Pilih gambar untuk diunggah disini.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="fs-sm text-gray">Gambar harus lebih besar dari <br> 1080x1080 pixel dan berukuran <br> kurang dari 500KB. Hanya file <br> JPG, JPEG, dan PNG yang bisa.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" value="Horror" type="checkbox" name="" id="yes_confirm_copyright">
                                        <label class=" fs-sm text-gray" for="yes_confirm_copyright">
                                            Saya mengkonfirmasi bahwa Komikku ini adalah <span class="text-primary">ciptaan saya</span> dan <span class="text-primary">milik saya.</span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="Horror" type="checkbox" name="" id="yes_confirm_contract">
                                        <label class=" fs-sm text-gray" for="yes_confirm_contract">
                                            Saya setuju dengan <a href="/contribute/contract" class="text-primary">kebijakan kontrak</a> dari Komiktoon.
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary border-0 rounded-1 px-4 py-3">Buat Draft <i class="bi bi-chevron-right"></i></button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal" id="confirmDeleteFIles" aria-hidden="true" tabindex="-1">
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

            let data = new FormData();
            data.append('file', document.getElementById('square_thumbnail').files[0]);

            axios.post('/contribute/content/create',data).then(function (response) {
                if(response.data.error){
                    $('#confirmDeleteFIles').modal('show')
                    $('#confirmDeleteFIles .modal-content p').html(response.data.error)
                }else{
                    const input = document.getElementById('square_thumbnail');
                    const preview = $('.square_thumbnail_show .imagePreview');
                    const file = input.files[0];
        
                    if (file) {
                        const reader = new FileReader();
        
                        preview.removeClass('d-none');
        
                        reader.onload = function (e) {
                            preview.attr('src', e.target.result);
                        };
        
                        reader.readAsDataURL(file);
                    } else {
                        return;
                    }
                }
            });

        });

        // end image 

        // max word 

        $(document).ready(function () {
            var maxChars = 49;

            $('.form-control.50').on('input', function () {
                    var inputText = $(this).val();

                    if (inputText.length >= maxChars) {
                        // Jika melebihi batas, potong teks menjadi 50 huruf pertama
                        var trimmedText = inputText.substring(0, maxChars);
                        $(this).val(trimmedText);
                    }

                    // Update jumlah huruf
                    $('#charCount').text(inputText.length);
                });
        });

        // end max word 


    </script>
@endpush



