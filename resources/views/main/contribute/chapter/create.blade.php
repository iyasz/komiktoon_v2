@extends('layout.contribute')

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
    <div id="app" class="mb-3">
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
                        <div class="row mt-5">
                            <div class="col-lg-8 col-12 order-lg-0 order-1">
                                <p class="text-gray mb-4 fw-500">Judul Serial : <span class="opacity-50">Kaisar Langit Terbangun Dari Tidur Lamanya</span></p>
                                <div class="mb-4 position-relative">
                                    <p class="text-gray mb-2 fw-500">Judul Chapter <span class="fs-s-sm opacity-50">(Optional)</span></p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-white px-md-5 px-3">1</span>
                                        <input type="text" class="form-control fs-sm pe-10" placeholder="Kurang dari 50 huruf">
                                    </div>
                                    <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                        <span class="fw-500">50</span>
                                        <span>/ 50</span>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="text-gray mb-0 fw-500">Extra Chapter</p>
                                    <span class="fs-s-sm opacity-50">Total Extra Chapter : 0</span>
                                    <div class="fs-4 mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_extra_chapter" id="yes_option" value="">
                                            <label class="form-check-label fs-6 text-gray" for="yes_option">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="is_extra_chapter" id="no_option" value="">
                                            <label class="form-check-label fs-6 text-gray" for="no_option">Bukan</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-4 ">
                                    <p class="text-gray fw-500">Upload File</p>
                                    <div class="mb-3 d-flex align-items-center">
                                        <button class="btn btn-primary fs-s-sm border-0 rounded-1 me-2 ">Pilih file</button>
                                        <button class="btn btn-danger fs-s-sm border-0 rounded-1 " data-bs-toggle="modal" data-bs-target="#confirmDeleteFIles" id="resetUploadsModal">Hapus semua</button>
                                        <div class="ms-auto">
                                            <p class="fs-sm mb-0"><span class="fw-600">12MB</span> / 20MB</p>
                                        </div>
                                    </div>

                                    <div class="upload_file_image rounded-2 bg-semi-gray">
                                        <div id="sortable" class="">
                                            @for($i = 1; $i < 14; $i++)
                                            <div id="draggable1" class="ui-state-default">
                                                <div class="item bg-white">
                                                    <div class="img">
                                                        <img src="https://asetto.nawalakarsa.id/imeji/20230220004102/5-Fakta-Menarik-yang-Perlu-Kamu-Ketahui-Tentang-Anime-Majo-no-Tabitabi-Header.jpg" width="100%" height="150px" class="object-fit-cover" alt="">
                                                    </div>
                                                    <p class="fs-s-sm m-2  one-line-text"><span class="number-file-increment me-1 fw-500">{{$i}}.</span>Elainakanjutbener.png</p>
                                                </div>
                                                <button class="btn bg-white fs-s-sm rounded-circle border-0"><i class="bi bi-x"></i></button>
                                            </div>
                                            @endfor

                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <button class="btn btn-primary fs-s-sm border-0 rounded-pill ">Pratinjau PC</button>
                                            <button class="btn btn-primary fs-s-sm border-0 rounded-pill ms-2 ">Pratinjau Mobile</button>
                                        </div>
                                    </div>

                                </div>
                                <hr class="my-5">
                                
                                <div class="mb-4 position-relative">
                                    <p class="text-gray mb-2 fw-500">Catatan Kreator <span class="fs-s-sm opacity-50">(Optional)</span></p>
                                    <textarea name="" id="" cols="10" rows="8" class="form-control fs-sm pe-10" placeholder="Kurang dari 400 huruf"></textarea>
                                    <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                        <span class="fw-500">400</span>
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
                                            <input class="form-check-input" type="radio" checked name="schedule_chapter" id="now_option" value="">
                                            <label class="form-check-label fs-6 text-gray" for="now_option">Sekarang</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="schedule_chapter" id="later_option" value="">
                                            <label class="form-check-label fs-6 text-gray" for="later_option">Jadwalkan</label>
                                        </div>
                                    </div>
                                    <div class="row calender_schedule mt-3 align-items-center">
                                        <div class="col-md-7 col-12">
                                            <input type="text" id="dateRelease" placeholder="" name="" class="form-control text-center text-gray">
                                        </div>
                                        <div class="col-md-2 col-6 mt-md-0 mt-2 pe-md-0 pe-1">
                                            <input type="text" name="" class="form-control text-center text-gray" value="{{ \Carbon\Carbon::now()->format('H')}}" id="timeRelease">
                                        </div>
                                        <div class="col-md-1 d-md-block d-none px-0 text-center">
                                            <p class="mb-0">:</p>
                                        </div>
                                        <div class="col-md-2 col-6 mt-md-0 mt-2 ps-md-0 ps-1">
                                            <input type="text" name="" class="form-control text-center text-gray" value="{{ \Carbon\Carbon::now()->format('i')}}" id="timeRelease">
                                        </div>
                                        <hr class="my-5">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-4 col-12 order-lg-1 order-0">
                                <div class="mb-3">
                                    <p class="fw-500 mb-2">Thumbnail Persegi </p>
                                    <input type="file" name="" id="square_thumbnail" class="d-none" >
                                    <div class="square_thumbnail_show">
                                        <div class="text-center">
                                            <i class="bi bi-cloud-arrow-up fs-1 opacity-50"></i>
                                            <p class="fs-sm">Pilih gambar untuk diunggah <br> Seret gambar dan taruh <br> disini.</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="fs-sm text-gray">Gambar harus lebih besar dari <br> 160x1160 pixel dan berukuran <br> kurang dari 500kb. Hanya file <br> JPG, JPEG, dan PNG yang berlaku. <br> (Boleh Menggunakan Gambar <br> Salah Satu Scene)</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary border-0 rounded-1 px-4 py-3">Simpan Chapter <i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                        
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
@endsection

@push('javascript')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        flatpickr("#dateRelease", {
            minDate: "today",
            defaultDate: "today",
            maxDate: new Date().fp_incr(364)
        });

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

        $('#sortable .ui-state-default button').on('click', function(){
            $(this).closest('#sortable .ui-state-default').remove();

            $("#sortable .ui-state-default").each(function(index) {
                    var orderNumber = index + 1;
                    $(this).find('.number-file-increment').text(orderNumber + '.');
            });
            
        })

        $('#resetUploadsButton').on('click', function(){
            $('.upload_file_image #sortable').html('')
            $('#confirmDeleteFIles').modal('hide')
        })
    </script>
@endpush



