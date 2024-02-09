@extends('layout.read')

<style>
    #app {
        margin-top: 50px;
    }
</style>

@section('content')

    <div class="modal" id="reportModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body p-5">
                    <div class="text-center mb-4">
                        <p class="">Pilih alasan anda melaporkan komik ini</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-check mb-3">
                                <input class="form-check-input report-value" value="1" type="radio" name="report-reason" id="kts">
                                <label class="form-check-label text-gray ms-1 fw-300" for="kts">
                                  Konten tidak sesuai
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input report-value" value="2" type="radio" name="report-reason" id="pk">
                                <label class="form-check-label text-gray ms-1 fw-300" for="pk">
                                  Penyebaran kebencian
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input report-value" value="3" type="radio" name="report-reason" id="phc">
                                <label class="form-check-label text-gray ms-1 fw-300" for="phc">
                                  Pelanggaran hak cipta
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-check mb-3">
                                <input class="form-check-input report-value" value="4" type="radio" name="report-reason" id="mks">
                                <label class="form-check-label text-gray ms-1 fw-300" for="mks">
                                  Mengandung konten seksual
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input report-value" value="5" type="radio" name="report-reason" id="pp">
                                <label class="form-check-label text-gray ms-1 fw-300" for="pp">
                                  Pelanggaran privasi
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input report-value" value="6" type="radio" name="report-reason" id="l">
                                <label class="form-check-label text-gray ms-1 fw-300" for="l">
                                  Lainnya
                                </label>
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-4 mx-3 mt-5">
                        <button class="btn bg-dark text-white py-3 px-5 border-0 rounded-pill" id="btnConfirmReport" data-bs-dismiss="modal">Laporkan</button>
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
                        <button class="btn bg-dark text-white py-3 px-5 border-0 rounded-pill" data-bs-dismiss="modal">YA</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="app">
        <div class="wrapper-img-content">
            @foreach ($decodeDataChapters as $data)
                <div class="img-content">
                    <img src="{{ Storage::url($data['photo']) }}" draggable="false" alt="">
                </div>
            @endforeach
        </div>
    </div>

    <div class="footer-content-chapter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="update d-flex align-items-center justify-content-center">
                        <img src="{{ asset('img/maskot/end_content.png') }}" width="40px" height="40px" alt="">
                        <p class="mb-0 ms-2">Update KAMIS</p>
                    </div>
                    <div class="mt-3">
                        <p class="fs-sm">Support komik ini <br> dengan memberikan like dan komentar positif!</p>
                    </div>
                    <div class="my-3 d-flex justify-content-center">
                        <button class="btn rounded-pill text-gray px-3 bg-semi-gray bg-none border-0 d-flex align-items-center mx-2" @if(Auth::user()) id="btnLikeChapter" @else onclick="window.location.href='/auth/login'" @endif>
                            <div class="svg">
                                @if($isLike == 0)
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                </svg>    
                                @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                </svg>
                                @endif
                            </div>
                            <span class="ms-2" id="chapterLikeTotal">{{number_format($chapterLikeCount)}}</span>
                        </button>
                        <button class="btn rounded-pill text-gray px-3 bg-semi-gray bg-none border-0 mx-2" @if(Auth::user()) id="btnReportContent" @else onclick="window.location.href='/auth/login'" @endif>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                            </svg>
                        </button>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <a @if($chapterPrevious != null) href="/{{$content->slug}}/{{$chapterPrevious->slug}}/view"@endif class="btn btn-primary {{$chapterPrevious == NULL ? 'disabled' : ''}} rounded-pill border-0 mx-3 fs-sm px-3">Previous <span class=" d-md-inline d-none">Chapter</span></a>
                        <a @if($chapterNext != NULL) href="/{{$content->slug}}/{{$chapterNext->slug}}/view"@endif class="btn btn-primary {{$chapterNext == NULL ? 'disabled' : ''}} rounded-pill border-0 mx-3 fs-sm px-3">Next <span class=" d-md-inline d-none"> Chapter</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                var scrollTop = $(this).scrollTop();
                var navbar = $(".navbar-control-page");

                if (scrollTop > 1) {
                    navbar.addClass("hide");
                } else {
                    navbar.removeClass("hide");
                }
            });

            $(".wrapper-img-content").on('click', function() {
                var navbar = $(".navbar-control-page");
                if (navbar.hasClass('hide')) {
                    navbar.removeClass("hide")
                } else {
                    navbar.addClass("hide")
                }
            })

            $(".navbar-control-page").hover(
                function() {
                    var navbar = $(".navbar-control-page");
                    if (navbar.hasClass('hide')) {
                        navbar.removeClass("hide");
                    }
                }
            );

            $('#btnLikeChapter').click(function(){
                var url = window.location.pathname;

                axios.post(url).then(function(response) {
                    if(response.data.status == 'create'){
                        $('#btnLikeChapter .svg').html(`
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                            </svg>
                        `)
                    }else{
                        $('#btnLikeChapter .svg').html(`
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                            </svg> 
                        `)
                    }

                    $('#chapterLikeTotal').text(new Intl.NumberFormat('en-US').format(response.data.like))
                }).catch(function(error) {
                    console.error(error);
                });

            })

            $('#btnConfirmReport').click(function(){
                var url = window.location.pathname;
                var value = $('.report-value:checked').val();

                axios.post(url+'/report', {value: value}).then(function(response) {
                    console.log(response);
                    if(response.data.message == 'fail'){
                        $('#alertModal').modal('show')
                        $('#alertModal .modal-content p').html("Terlalu banyak report!, coba lagi besok ..")
                    }
                }).catch(function(error) {
                    console.error(error);
                });

            })

            $('#btnReportContent').click(function(){
                $('#reportModal').modal('show')
            })


        });
    </script>
@endpush
