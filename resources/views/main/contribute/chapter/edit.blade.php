@extends('layout.contribute')
@section('content-active', 'text-primary')

@push('css')
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
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

                        <div class="row mt-5">
                            <div class="col-lg-8 col-12 order-lg-0 order-1">
                                <p class="text-gray mb-4 fw-500">Judul Serial : <span
                                        class="opacity-50">{{ $content->title }}</span></p>
                                <div class="mb-4 position-relative max-input-group">
                                    <p class="text-gray mb-2 fw-500">Judul Chapter <span class="fs-s-sm opacity-50">(Optional)</span></p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text bg-white px-md-5 px-3">{{ $chapterCount }}</span>
                                        <input type="text" value="{{ preg_replace('/^CHAPTER (?:\d+|EXTRA) - /', '', $chapter->title) }}" required data-max-num="50" class="form-control fs-sm pe-10" name="title" id="chapter-title" placeholder="Kurang dari 50 huruf">
                                        @error('title')
                                            <p class="fs-s-sm text-danger mt-2 mb-0">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                        <span class="fw-500 current-text-count">0</span>
                                        <span>/ 50</span>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="text-gray mb-0 fw-500">Extra Chapter</p>
                                    <span class="fs-s-sm opacity-50">Total Extra Chapter : {{ $chapterExtraCount }}</span>
                                    <div class="fs-4 mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-inp is_extra_chapter"
                                                {{ $chapter->is_extra_chapter == 1 ? 'checked' : '' }} type="radio"
                                                name="is_extra_chapter" id="yes_option" value="1">
                                            <label class="form-check-label fs-6 text-gray" for="yes_option">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-inp is_extra_chapter"
                                                {{ $chapter->is_extra_chapter == 2 ? 'checked' : '' }} type="radio"
                                                name="is_extra_chapter" id="no_option" value="2">
                                            <label class="form-check-label fs-6 text-gray" for="no_option">Bukan</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-4 ">
                                    <p class="text-gray fw-500">Upload File</p>
                                    <div class="mb-3 d-flex align-items-center">
                                        {{-- <input type="hidden" name="" id="_selectFileInput" multiple> --}}
                                        <a class="btn btn-primary fs-s-sm border-0 rounded-1 me-2" id="inpSelectFile">Pilih
                                            file</a>
                                        <a class="btn btn-danger fs-s-sm border-0 rounded-1" id="resetUploadsModal">Hapus semua</a>
                                        {{-- <div class="ms-auto">
                                            <p class="fs-sm mb-0"><span class="fw-600" id="sizeFileContent">0KB</span> /
                                                20MB</p>
                                        </div> --}}
                                    </div>

                                    <div class="upload_file_image rounded-2 bg-semi-gray">
                                        <div id="sortable">
                                            @php
                                                $dataImage = json_decode($chapter->images)
                                            @endphp
                                            @foreach ($dataImage as $key => $item)
                                            <div id="draggable" class="ui-state-default">
                                                <div class="item bg-white">
                                                    <div class="img dz-image">
                                                        <img data-dz-thumbnail src="{{Storage::url($item->photo)}}" width="100%" height="150px" class="object-fit-cover" alt="">
                                                    </div>
                                                    <p class="fs-s-sm m-2 one-line-text"><span class="number-file-increment me-1 fw-500">{{$key + 1}}</span>. <span data-dz-name>{{$chapter->title}}</span></p>
                                                </div>
                                                <button class="btn bg-white fs-s-sm rounded-circle border-0 dz-remove" data-dz-remove><i class="bi bi-x"></i></button>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <p class="fs-sm opacity-75 fw-300 mt-3">Sistem akan otomatis memotong dan mengurangi
                                        ukuran gambarmu untuk memenuhi dimensi gambar maksimal, yaitu 800px x 1000 px. <br>
                                        Gambar yang melebihi dimensi maksimal mungkin dioptimisasi dengan beberapa cara.
                                        Gambar dapat dipotong menjadi beberapa gambar, kualitas gambar mungkin menurun,
                                        dimensi gambar mungkin dikurangi, dan/atau ukuran dokumen serta format mungkin
                                        berubah. <br>
                                        Ukuran maksimum untuk semua gambar yang dapat diunggah adalah 2MB. Kamu dapat
                                        mengunggah hingga total 20MB dan 100 gambar. <br>
                                        Jika kamu tidak bersedia gambarmu dioptimisasi dengan cara apa pun, harap pastikan
                                        mengunggah gambar berukuran maksimum 800x1280px dan memenuhi batas ukuran dokumen.
                                        <br>
                                        Hanya format JPG, JPEG, dan PNG yang diizinkan.
                                    </p>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <a class="btn btn-primary fs-s-sm border-0 rounded-pill ">Pratinjau PC</a>
                                            <a class="btn btn-primary fs-s-sm border-0 rounded-pill ms-2 ">Pratinjau
                                                Mobile</a>
                                        </div>
                                    </div>

                                </div>
                                <hr class="my-5">

                                <div class="mb-4 position-relative max-input-group">
                                    <p class="text-gray mb-2 fw-500">Catatan Kreator <span
                                            class="fs-s-sm opacity-50">(Optional)</span></p>
                                    <textarea data-max-num="400" name="note" id="creator-note" cols="10" rows="8"  class="form-control fs-sm pe-10" placeholder="Kurang dari 400 huruf">{{ $chapter->note }}</textarea>
                                    <div class="text-gray max-input-text fs-sm d-md-block d-none">
                                        <span class="fw-500 current-text-count">0</span>
                                        <span>/ 400</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4 col-12 order-lg-1 order-0">
                                <div class="mb-3">
                                    <p class="fw-500 mb-2 text-gray">Thumbnail Persegi </p>
                                    <input type="file" name="thumbnail" id="square_thumbnail" class="d-none">
                                    <div class="square_thumbnail_show">
                                        <img src="{{Storage::url($chapter->thumbnail)}}" data-img="{{Storage::url($chapter->thumbnail)}}" alt="banner" class="imagePreview">
                                        <div class="text-center">
                                            <i class="bi bi-cloud-arrow-up fs-1 opacity-50"></i>
                                            <p class="fs-sm opacity-75">Pilih
                                                gambar untuk diunggah disini.</p>
                                        </div>
                                    </div>

                                </div>
                                <p class="fs-sm text-gray">Gambar harus lebih besar dari <br> 160x160 pixel dan berukuran
                                    <br> kurang dari 500kb. Hanya file <br> JPG, JPEG, dan PNG yang berlaku. <br> (Boleh
                                    Menggunakan Potongan <br> Gambar Salah Satu Scene)
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary border-0 rounded-1 px-4 py-3" id="saveDataChapter">Simpan Chapter <i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal fade" id="confirm-delete-all-files" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body py-5">
                    <div class="text-center">
                        <p>Yakin ingin menghapus semua files?</p>
                    </div>
                    <div class="d-flex justify-content-center mt-4 mx-3">
                        <button class="btn btn-primary w-100 fs-sm py-3 px-4 border-0 mx-2 rounded-pill"
                            id="resetUploadsButton">Hapus</button>
                        <button class="btn bg-semi-gray w-100 fs-sm py-3 px-4 border-0 mx-2 rounded-pill"
                            data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="alertModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body p-5">
                    <div class="text-center">
                        <p class="text-gray"></p>
                    </div>
                    <div class="d-flex justify-content-center mt-4 mx-3">
                        <button class="btn bg-dark text-white py-3 px-5 border-0 rounded-pill"
                            data-bs-dismiss="modal">YA</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" data-bs-backdrop="static" data-bs-keyboard="false" id="progressBar" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body py-5">
                    <div class="text-center">
                        <p class="text-gray">Sedang mengunggah file ..</p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">

                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                            style="height: 6px; width: 80%;">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex fs-sm ms-2">
                            <span id="uploadContentCount">0</span>
                            <span class="text-gray uploadContentCountTotal">/0</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')

    <script>

        $(document).ready(function() {
            function updateElements() {
                var isChecked = $('#later_option').is(':checked');
                $('#dateRelease').prop('disabled', !isChecked);
            }
            updateElements();
            $('input[name="schedule_chapter"]').change(updateElements);

            $('#now_option').on('click', function() {
                var todayDate = new Date();
                flatpickr("#dateRelease", {
                    minDate: "today",
                    maxDate: new Date().fp_incr(364),
                    defaultDate: "today"
                });
            });
        });
    </script>

    <script>
        // Content file 

        $('#inpSelectFile').click(function() {
            $('#sortable').click();
        });

        $(document).ready(function() {

            Dropzone.autoDiscover = false;

            var slug = location.pathname.split("/")[4];
            var index = 0;
            var totalSize = 0;
            var uploadprogressCount = 0;
            var totalProgressCount = 0;
            var totalSizeCalc = 0
            var totalProgress = 0;

            var fileContent = new Dropzone("#sortable", {
                url: "/contribute/chapter/" + slug,
                previewTemplate: `
                        <div id="draggable" class="ui-state-default">
                            <div class="item bg-white">
                                <div class="img dz-image">
                                    <img data-dz-thumbnail width="100%" height="150px" class="object-fit-cover" alt="">
                                </div>
                                <p class="fs-s-sm m-2 one-line-text"><span class="number-file-increment me-1 fw-500">${index}</span><span data-dz-name></span></p>
                            </div>
                            <button class="btn bg-white fs-s-sm rounded-circle border-0 dz-remove" data-dz-remove><i class="bi bi-x"></i></button>
                        </div>
                    `,
                paramName: "file",
                acceptedFiles: 'image/png, image/jpg, image/jpeg',
                maxThumbnailFilesize: 20,
                thumbnailMethod: "crop",
                thumbnailWidth: 800,
                thumbnailHeight: 1240,
                dictInvalidFileType: "Tipe file ini tidak diizinkan",
                dictResponseError: "Terjadi kesalahan saat mengunggah file.",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                init: function() {

                    this.on("addedfile", function(file) {

                        // cek type 
                        if (file.type != "image/jpeg" && file.type != "image/png" && file
                            .type != "image/png") {
                            return false
                        }
                        // end cek type 

                        // menghitung index 
                        $("#sortable .ui-state-default").each(function(index) {
                            var orderNumber = index + 1;
                            $(this).find('.number-file-increment').text(orderNumber +
                                '.');
                        });
                        // end menghitung index 

                        $('#progressBar').modal('show')

                        // cek upload file 

                        totalProgressCount++
                        $('.uploadContentCountTotal').text('/' + totalProgressCount)

                        // end cek upload file 
                    });

                    this.on('totaluploadprogress', function(progress) {
                        
                        // progress bar 
                        
                        var total = 100 / totalProgressCount;
                        totalProgress += total;

                        if (totalProgress > 100) {
                            totalProgress = 100;
                        }

                        $('.progress-bar').css('width', totalProgress+'%')

                    });

                    this.on("removedfile", function(file) {

                        if (file.type != "image/jpeg" && file.type != "image/png" && file
                            .type != "image/png") {
                            return false
                        }

                        // cek index 
                        $("#sortable .ui-state-default").each(function(index) {
                            var orderNumber = index + 1;
                            $(this).find('.number-file-increment').text(orderNumber +
                                '.');
                        });
                        // end cek index 

                    });

                    this.on("queuecomplete", function(file) {
                        setTimeout(function() {
                            totalProgressCount = 0
                            $('#uploadContentCount').text('0')
                            $('.uploadContentCountTotal').text('/' + totalProgressCount)
                            $('#progressBar').modal('hide');

                            totalProgress = 0
                            $('.progress-bar').css('width', '0%')

                        }, 500);
                    });

                    this.on("success", function(file, response) {


                        uploadprogressCount++
                        $("#uploadContentCount").text(uploadprogressCount);

                        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles()
                            .length === 0) {
                            uploadprogressCount = 0
                        }

                        console.log("File uploaded successfully:", file);
                        console.log("Server response:", response);
                    });

                    this.on("error", function(file, errorMessage) {

                        $('#alertModal').modal('show')
                        $('#alertModal .modal-content p').html("Type file \"" + file.name + "\" harus berupa JPEG, JPG, atau PNG")
                        this.removeFile(file);

                    });

                    this.on("canceled", function(file) {
                        $('#alertModal').modal('show')
                        $('#alertModal .modal-content p').html("Upload gambar dibatalkan")
                    });

                }
            });
            $('#resetUploadsModal').on('click', function() {
                if ($('#sortable').length == 0) {
                    $('#alertModal').modal('show');
                    $('#alertModal .modal-content p').html('Tidak dapat dihapus: Tidak ada file untuk dihapus');
                } else {
                    $('#confirm-delete-all-files').modal('show');
                }
            });

            $('#resetUploadsButton').on('click', function() {
                fileContent.removeAllFiles();
                $('#sortable').html('')
                $('#confirm-delete-all-files').modal('hide');
            });

        })
        // End Content file 
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
    </script>

    <script>
        // image 

        $('.square_thumbnail_show').on('click', function() {
            $('#square_thumbnail').click()
        })

        $('#square_thumbnail').on('change', function() {

            let fileInput = document.getElementById('square_thumbnail');
            let file = fileInput.files[0];
            const preview = $('.square_thumbnail_show .imagePreview');

            if (file && file.size > (500 * 1024)) {
                fileInput.value = '';
                preview.attr('src', $(preview).data('img'));
                $('#alertModal').modal('show')
                $('#alertModal .modal-content p').html('Tidak dapat mengunggah file lebih dari 500KB')
            } else {
                let data = new FormData();
                data.append('file', file);

                var slug = location.pathname.split("/")[4];
                axios.post('/contribute/chapter/create/' + slug, data).then(function(response) {

                    if (response.data.error) {
                        fileInput.value = '';
                        preview.attr('src', $(preview).data('img'));
                        $('#alertModal').modal('show')
                        $('#alertModal .modal-content p').html(response.data.error)
                    } else {
                        const input = document.getElementById('square_thumbnail');
                        const file = input.files[0];

                        if (file) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                preview.attr('src', e.target.result);
                            };

                            reader.readAsDataURL(file);
                        } else {
                            fileInput.value = '';
                            preview.attr('src', $(preview).data('img'));
                        }
                    }
                });

            }

        });

        // end image 

        // max word 
        $(document).ready(function() {
            $('#creator-note, #chapter-title').on('input', function() {
                var maxDataNumber = $(this).attr('data-max-num');
                var inputText = $(this).val();

                if (inputText.length > maxDataNumber) {
                    var trimmedText = inputText.substring(0, maxDataNumber);
                    $(this).val(trimmedText);
                }

                $(this).closest('.max-input-group').find('.current-text-count').text($(this).val().length);
            });

            $('#creator-note, #chapter-title').each(function() {
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

        // simpan data 

        $('#saveDataChapter').on('click', function() {

            if ($('input[name="is_extra_chapter"]:checked').length === 0) {
                $('#alertModal').modal('show')
                $('#alertModal .modal-content p').html('Extra chapter harus dipilih!')
                return false;
            }

            if (!$.trim($('#square_thumbnail').val())) {
                $('#alertModal').modal('show')
                $('#alertModal .modal-content p').html('Masukan thumbnail chapter!')
                return false;
            }

            if ($('.ui-state-default').length < 5) {
                $('#alertModal').modal('show')
                $('#alertModal .modal-content p').html('File chapter minimal 5 gambar!')
                return false;
            }

            $(this).addClass('disabled')

            let data = new FormData();

            let fileInput = document.getElementById('square_thumbnail');
            let thumbnail = fileInput.files[0];

            data.append('is_extra_chapter', $('.form-check-inp.is_extra_chapter:checked').val());
            data.append('title', $('#chapter-title').val());
            data.append('thumbnail', thumbnail);
            data.append('note', $('#creator-note').val());
            let base64Images = [];

            // Mengambil data base64 dari setiap gambar dan menyimpannya dalam array
            $('.img.dz-image img').each(function() {
                let base64Data = $(this).attr('src').split(',')[1];
                base64Images.push(base64Data);
            });

            base64Images.forEach(function(base64Data) {
                data.append('gambar[]', base64Data);
            });


            var slug = location.pathname.split("/")[4];

            axios.post('/contribute/chapter/store/' + slug, data).then(function(response) {
                window.location.href="/contribute/content"
            }).catch(function(error) {
                console.error(error);
            });

        })

        // end simpan data 

    </script>
@endpush
