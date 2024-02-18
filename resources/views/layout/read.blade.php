<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komiktoon | Tempat membaca komik setiap hari</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/maskot/fav-icon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('css')
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
</head>

<body class="bg-white">

    <div class="wrapper navbar-control-page">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12">
                    <div class="d-flex align-items-center h-100 position-relative ">
                        <div class="d-flex align-items-center">
                            <a href="/" class="d-md-block d-none">
                                <img src="{{ asset('img/maskot/ch_icon.png') }}" width="28px" height="28px" alt="">
                            </a>
                            <a href="/komik/{{ $content->slug }}/list" class="d-md-none d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-list-ul me-3" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                  </svg>
                            </a>
                            <a href="/komik/{{ $content->slug }}/list" class="text-decoration-none text-white ms-3 d-md-block d-none">{{ $content->title }}</a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-3 d-md-block d-none" width="14" height="14"
                                fill="#fff" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                            </svg>
                            @php
                                $parts = explode(" - ", $chapter->title);
                                $chapterDetailNumber = $parts[0];
                            @endphp
                            <p class="mb-0 text-white d-md-block d-none ">{{$chapterDetailNumber}}</p>
                        </div>
                        <div class="nav-control d-flex align-items-center">
                            <div class="left">
                                <a @if($chapterPrevious != null) href="/{{$content->slug}}/{{$chapterPrevious->slug}}/view" @endif class="btn btn-dark {{$chapterPrevious == NULL ? 'disabled' : ''}} px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                                    </svg>
                                </a>
                            </div>
                            <div class="eps mx-3">
                                <p class="text-white mb-0">#{{ $indexOfCreated }}</p>
                            </div>
                            <div class="right">
                                <a @if($chapterNext != NULL) href="/{{$content->slug}}/{{$chapterNext->slug}}/view"@endif class="btn btn-dark {{$chapterNext == NULL ? 'disabled' : ''}} px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16"> <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <button class="btn rounded-circle bg-transparent" id="fullScreenBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff"
                                    class="bi bi-fullscreen" viewBox="0 0 16 16">
                                    <path d="M1.5 1a.5.5 0 0 0-.5.5v4a.5.5 0 0 1-1 0v-4A1.5 1.5 0 0 1 1.5 0h4a.5.5 0 0 1 0 1zM10 .5a.5.5 0 0 1 .5-.5h4A1.5 1.5 0 0 1 16 1.5v4a.5.5 0 0 1-1 0v-4a.5.5 0 0 0-.5-.5h-4a.5.5 0 0 1-.5-.5M.5 10a.5.5 0 0 1 .5.5v4a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 0 14.5v-4a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v4a1.5 1.5 0 0 1-1.5 1.5h-4a.5.5 0 0 1 0-1h4a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @yield('content')

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Event handler untuk tombol
            $("#fullScreenBtn").click(function() {
                var elem = document.documentElement; // Dapatkan elemen root (biasanya <html>)

                var fullscreenElement = document.fullscreenElement || document.mozFullScreenElement ||
                    document.webkitFullscreenElement || document.msFullscreenElement;
                if (fullscreenElement) {
                    // Keluar dari mode layar penuh jika sedang dalam mode tersebut
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.mozCancelFullScreen) { // Firefox
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) { // Chrome, Safari dan Opera
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) { // Internet Explorer / Edge
                        document.msExitFullscreen();
                    }
                } else {
                    // Meminta mode layar penuh jika tidak dalam mode tersebut
                    if (elem.requestFullscreen) {
                        elem.requestFullscreen();
                    } else if (elem.mozRequestFullScreen) { // Firefox
                        elem.mozRequestFullScreen();
                    } else if (elem.webkitRequestFullscreen) { // Chrome, Safari dan Opera
                        elem.webkitRequestFullscreen();
                    } else if (elem.msRequestFullscreen) { // Internet Explorer / Edge
                        elem.msRequestFullscreen();
                    }
                }

            });
        });
    </script>

    @stack('javascript')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>

</html>
