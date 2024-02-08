@extends('layout.read')

<style>
    #app {
        margin-top: 50px;
    }
</style>

@section('content')
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
                    <div class="d-flex justify-content-center">
                        <a href="" class="btn btn-primary rounded-pill border-0 mx-3 fs-sm px-3">Previous Chapter</a>
                        <a href="" class="btn btn-primary rounded-pill border-0 mx-3 fs-sm px-3">Next Chapter</a>
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


        });
    </script>
@endpush
