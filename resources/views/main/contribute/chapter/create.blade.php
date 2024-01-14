@extends('layout.contribute')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    

    <style>

        .flatpickr-monthDropdown-months {
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            appearance: none !important;
        }

        .flatpickr-day.selected {
            background: #f49a97 !important;
            border-color: #f49a97 !important;
        }
    </style>
@endpush

@section('content')
    <div id="app">
        <div class="row">

            <div class="col-lg-12 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="d-flex align-items-center mx-5">
                                        <div class="stepper d-md-block d-none">
                                            <h4 class="mb-0">1</h4>
                                        </div>
                                        <p class="ms-md-3 ms-0 fw-400 mt-3 fs-6">SERIAL</p>
                                    </div>
                                    <div class="position-relative d-md-block d-none">
                                        <div class="bar-chapter"></div>
                                    </div>
                                    <p class="mb-0 d-md-none d-flex align-items-center opacity-50 ">/</p>
                                    <div class="d-flex align-items-center mx-5">
                                        <div class="stepper active d-md-block d-none">
                                            <h4 class="mb-0">2</h4>
                                        </div>
                                        <p class="ms-md-3 ms-0 fw-400 mt-3 fs-6 text-primary">CHAPTER</p>
                                    </div>

                                </div>
                            </div>
                            <hr class="mx-lg-5 mx-2">

                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mt-5">
                                    <div class="col-lg-8 col-12 order-lg-0 order-1">
                                        <p class="text-gray mb-4 fw-500">Judul Serial : <span class="opacity-50">{{$content->title}}</span></p>
                                        <div class="mb-4 position-relative max-input-group">
                                            <p class="text-gray mb-2 fw-500">Judul Chapter <span class="fs-s-sm opacity-50">(Optional)</span></p>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text bg-white px-md-5 px-3">{{$chapterCount}}</span>
                                                <input type="text" value="{{old('title')}}" required data-max-num="50" class="form-control fs-sm pe-10" name="title" id="chapter-title" placeholder="Kurang dari 50 huruf">
                                                @error('title')<p class="fs-s-sm text-danger mt-2 mb-0">{{$message}}</p>@enderror
                                            </div>
                                            <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                                <span class="fw-500 current-text-count">0</span>
                                                <span>/ 50</span>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <p class="text-gray mb-0 fw-500">Extra Chapter</p>
                                            <span class="fs-s-sm opacity-50">Total Extra Chapter : {{$chapterExtraCount}}</span>
                                            <div class="fs-4 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-inp" required {{old('title') == 1 ? 'checked' : ''}} type="radio" name="is_extra_chapter" id="yes_option" value="1">
                                                    <label class="form-check-label fs-6 text-gray" for="yes_option">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-inp" required {{old('title') == 2 ? 'checked' : ''}} type="radio" name="is_extra_chapter" id="no_option" value="2">
                                                    <label class="form-check-label fs-6 text-gray" for="no_option">Bukan</label>
                                                </div>
                                            </div>
                                            @error('is_extra_chapter')<p class="fs-s-sm text-danger mt-2 mb-0">{{$message}}</p>@enderror


                                        </div>

                                        <div class="mb-4 ">
                                            <p class="text-gray fw-500">Upload File</p>
                                            <div class="mb-3 d-flex align-items-center">
                                                {{-- <input type="hidden" name="" id="_selectFileInput" multiple> --}}
                                                <a class="btn btn-primary fs-s-sm border-0 rounded-1 me-2" id="inpSelectFile">Pilih file</a>
                                                <a class="btn btn-danger fs-s-sm border-0 rounded-1 " data-bs-toggle="modal" data-bs-target="#confirmDeleteFIles" id="resetUploadsModal">Hapus semua</a>
                                                <div class="ms-auto">
                                                    <p class="fs-sm mb-0"><span class="fw-600">12MB</span> / 20MB</p>
                                                </div>
                                            </div>

                                            <div class="upload_file_image rounded-2 bg-semi-gray" >
                                                <div id="sortable">
                                                    {{-- @for($i = 1; $i < 4; $i++)
                                                    <div id="draggable1" class="ui-state-default">
                                                        <div class="item bg-white">
                                                            <div class="img">
                                                                <img src="https://asetto.nawalakarsa.id/imeji/20230220004102/5-Fakta-Menarik-yang-Perlu-Kamu-Ketahui-Tentang-Anime-Majo-no-Tabitabi-Header.jpg" width="100%" height="150px" class="object-fit-cover" alt="">
                                                            </div>
                                                            <p class="fs-s-sm m-2  one-line-text"><span class="number-file-increment me-1 fw-500">{{$i}}.</span>Elainakanjutbener.png</p>
                                                        </div>
                                                        <button class="btn bg-white fs-s-sm rounded-circle border-0"><i class="bi bi-x"></i></button>
                                                    </div>
                                                    @endfor --}}

                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <a class="btn btn-primary fs-s-sm border-0 rounded-pill ">Pratinjau PC</a>
                                                    <a class="btn btn-primary fs-s-sm border-0 rounded-pill ms-2 ">Pratinjau Mobile</a>
                                                </div>
                                            </div>

                                        </div>
                                        <hr class="my-5">
                                        {{-- <div id="upload_file_image" class="dropzone"></div> --}}
                                        
                                        <div class="mb-4 position-relative max-input-group">
                                            <p class="text-gray mb-2 fw-500">Catatan Kreator <span class="fs-s-sm opacity-50">(Optional)</span></p>
                                            <textarea data-max-num="400" name="note" id="creator-note" cols="10" rows="8" class="form-control fs-sm pe-10" placeholder="Kurang dari 400 huruf">{{old('note')}}</textarea>
                                            @error('note')<p class="fs-s-sm text-danger mt-2 mb-0">{{$message}}</p>@enderror
                                            <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                                <span class="fw-500 current-text-count">0</span>
                                                <span>/ 400</span>
                                            </div>
                                        </div>

                                        <div class=" position-relative">
                                            <p class="text-gray mb-2 fw-500">Jadwal Terbit</p>
                                            <div class="bg-semi-gray max-content">
                                                <p class="fs-s-sm p-2 mx-2 text-gray">Chapter yang dijadwalkan : <span class="fw-600 text-primary">0</span></p>
                                            </div>
                                            <div class="fs-4 mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-inp" type="radio" checked name="schedule_chapter" required id="now_option" value="1">
                                                    <label class="form-check-label fs-6 text-gray" for="now_option">Sekarang</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-inp" type="radio" name="schedule_chapter" {{old('schedule_chapter') == 2 ? 'checked' : ''}} required id="later_option" value="2">
                                                    <label class="form-check-label fs-6 text-gray" for="later_option">Jadwalkan</label>
                                                </div>
                                            </div>
                                            <div class="row calender_schedule mt-4 align-items-center">
                                                <div class="col-md-7 col-12">
                                                    <input type="text" id="dateRelease" name="" class="form-control text-center text-gray">
                                                </div>
                                                <div class="col-md-5 col-12 mt-md-0 mt-2">
                                                    <input type="text" id="timeRelease" name="" class="form-control text-center text-gray">
                                                </div>
                                                {{-- <div class="col-md-2 col-6 mt-md-0 mt-2 pe-md-0 pe-1">
                                                    <select name="" id="timeReleaseHour" class="form-control text-gray text-center">
                                                        @for($i = 1; $i < 25; $i++)
                                                            <option {{$i == \Carbon\Carbon::now()->format('H') ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                    <input type="text" name="" class="form-control text-center text-gray" value="{{ \Carbon\Carbon::now()->format('H')}}" id="timeReleaseHour">
                                                </div>
                                                <div class="col-md-1 d-md-block d-none px-0 text-center">
                                                    <p class="mb-0">:</p>
                                                </div>
                                                <div class="col-md-2 col-6 mt-md-0 mt-2 ps-md-0 ps-1">
                                                    <select name="" id="timeReleaseMinute" class="form-control text-gray text-center">
                                                        @for($i = 1; $i < 60; $i++)
                                                            @if($i % 10 != 0)
                                                                @continue
                                                            @endif
                                                            <option {{$i == \Carbon\Carbon::now()->format('H') ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                    <input type="text" name="" class="form-control text-center text-gray" value="{{ \Carbon\Carbon::now()->format('i')}}" id="timeReleaseMinute">
                                                </div> --}}
                                                <hr class="my-5">
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
                                        <p class="fs-sm text-gray">Gambar harus lebih besar dari <br> 160x160 pixel dan berukuran <br> kurang dari 500kb. Hanya file <br> JPG, JPEG, dan PNG yang berlaku. <br> (Boleh Menggunakan Gambar <br> Salah Satu Scene)</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form>
                                        <button class="btn btn-primary border-0 rounded-1 px-4 py-3">Simpan Chapter <i class="bi bi-chevron-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="confirmDeleteFIles" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body py-5">
              <div class="text-center">
                <p>Yakin ingin menghapus semua files?</p>
              </div>
              <div class="d-flex justify-content-center mt-4 mx-3">
                  <button class="btn btn-primary w-100 fs-sm py-3 px-4 border-0 mx-2 rounded-pill" id="resetUploadsButton">Hapus</button>
                  <button class="btn bg-semi-gray w-100 fs-sm py-3 px-4 border-0 mx-2 rounded-pill" data-bs-dismiss="modal">Batal</button>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("#dateRelease", {
            minDate: "today",
            defaultDate: "today",
            maxDate: new Date().fp_incr(364)
        });

        flatpickr("#timeRelease", {
            enableTime: true,
            noCalendar: true,
            defaultDate: new Date(),
            dateFormat: "H : i",
            minTime: '14:00',
            maxTime: '14:00',
            time_24hr: true
        });




    </script>

    <script>

        // Content file 

        $('#inpSelectFile').click(function() {
            $('#sortable').click(); 
        });

        $(document).ready(function(){

            Dropzone.autoDiscover = false; 
            
            var slug = location.pathname.split("/")[4];
            var index = 0;
            var fileContent = new Dropzone("#sortable", {
                url: "/contribute/chapter/"+slug, 
                previewTemplate: 
                    `
                        <div id="draggable" class="ui-state-default">
                            <div class="item bg-white">
                                <div class="img dz-image">
                                    <img data-dz-thumbnail width="100%" height="150px" class="object-fit-cover" alt="">
                                </div>
                                <p class="fs-s-sm m-2 one-line-text"><span class="number-file-increment me-1 fw-500">${index}</span><span data-dz-name></span></p>
                            </div>
                            <button class="btn bg-white fs-s-sm rounded-circle border-0 dz-remove" data-dz-remove><i class="bi bi-x"></i></button>
                        </div>
                    `
               ,
                paramName: "file", 
                maxFilesize: 5, 
                maxFiles: 5, // Jumlah maksimum file yang diizinkan diunggah
                acceptedFiles: "image/*", // Jenis file yang diizinkan (misalnya, hanya gambar)
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function() {
                    this.on("addedfile", function (file) {
                        index++;
                        file.previewElement.querySelector(".number-file-increment").textContent = index + '.';
                    });

                    this.on("removedfile", function(file) {
                        $("#sortable .ui-state-default").each(function(index) {
                            var orderNumber = index + 1;
                            $(this).find('.number-file-increment').text(orderNumber + '.');
                        });
                    });

                    this.on("success", function(file, response) {
                        console.log("File uploaded successfully:", file);
                        console.log("Server response:", response);
                    });

                    this.on("error", function(file, errorMessage) {
                        console.error("Error uploading file:", file);
                        console.error("Error message:", errorMessage);
                    });
                }
            });
        })

        // End Content file 

    </script>

    <script>

        // jadwal terbit 
        
        $(document).ready(function() {
            function updateElements() {
                var isChecked = $('#later_option').is(':checked');
                $('#dateRelease, #timeRelease').prop('disabled', !isChecked);
            }

            updateElements();
            $('input[name="schedule_chapter"]').change(updateElements);
        });

        
        // end jadwal terbit 

    </script>


    <script type="text/javascript">
        
        $(document).ready(function() {
            $("#sortable").sortable({
                revert: true,
                update: function(event, ui) {
                    updateOrder();
                },
            });

            function updateOrder() {
                $("#sortable .ui-state-default").each(function(index) {
                    var orderNumber = index + 1;
                    $(this).find('.number-file-increment').text(orderNumber + '.');
                });
            }

        });

        $('#resetUploadsButton').on('click', function(){
            $('.upload_file_image #sortable').html('')
            $('#confirmDeleteFIles').modal('hide')
        })
    </script>

    <script>
         // image 

         $('.square_thumbnail_show').on('click', function(){
            $('#square_thumbnail').click()
        })

        $('#square_thumbnail').on('change', function () {

            let fileInput = document.getElementById('square_thumbnail');
            let file = fileInput.files[0];

            if (file && file.size > (500 * 1024)) { 
                $('#alertModal').modal('show')
                $('#alertModal .modal-content p').html('Tidak dapat mengunggah file lebih dari 500KB')
                fileInput.value = '';
            }else {
                let data = new FormData();
                data.append('file', file);

                var slug = location.pathname.split("/")[4];
                axios.post('/contribute/chapter/create/'+slug,data).then(function (response) {
                    if(response.data.error){
                        fileInput.value = '';
                        $('#alertModal').modal('show')
                        $('#alertModal .modal-content p').html(response.data.error)
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

            }

        });

        // end image 

        // max word 
        $(document).ready(function () {
            $('#creator-note, #chapter-title').on('input', function () {
                var maxDataNumber = $(this).attr('data-max-num');
                var inputText = $(this).val();

                if (inputText.length > maxDataNumber) {
                    var trimmedText = inputText.substring(0, maxDataNumber);
                    $(this).val(trimmedText);
                }

                $(this).closest('.max-input-group').find('.current-text-count').text($(this).val().length);
            });

            $('#creator-note, #chapter-title').each(function () {
                var maxDataNumber = $(this).attr('data-max-num');
                var inputText = $(this).val();
                $(this).closest('.max-input-group').find('.current-text-count').text(inputText.length);
            });
        });

        // end max word 

        // submit validasi 

        $('.btn.btn-primary.draft').click(function() {
            var fileInput = $('#square_thumbnail')[0];

            if (fileInput.files.length === 0) {
                var errorMessage = 'File gambar tidak boleh kosong!';
                $('#alertModal').modal('show');
                $('#alertModal .modal-content p').html(errorMessage);
                return false;
            }

            $(this).attr('disabled', 'disabled');
            $(this).closest('form').submit();
        });

        // end submit validasi 


        //         {
//   "awdawd.png",  "awdawd.png",  "awdawd.png"
// },
// {
// 0 {
//   photo: "awdawd.png",
//   size: 200,
//   ext: "png"
// },
// 1 {
//   photo: "awdawd.png",
//   size: 200,
//   ext: "jpg"
// }
// }

// $gambars = [];



// json_encode($gambars)


// $gambars = json_decode($chapter->images, true);

    </script>

    
@endpush



