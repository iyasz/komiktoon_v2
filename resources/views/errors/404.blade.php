<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komiktoon | 404</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/maskot/fav-icon.png')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
  </head>
    <style>
      .wrapper-404 .content h1 {
        font-size: 70px;
      }
    </style>
    
  <body>  


    <div class="container my-5">
      <div class="row">
        <div class="col-12">
          <div class="card border-0 shadow-sm">
            <div class="card-header border-0 bg-primary py-1"></div>
            <div class="card-body wrapper-404 text-center">
              <div class="content mt-5">
                <h1 class="fw-600">404</h1>
                <p class="mb-0">Halaman Tidak Ditemukan</p>
              </div>
              <div class="">
                <img src="{{asset('/img/maskot/SearchNotFound.gif')}}" width="320px" alt="">
              </div>
              <div class="mt-3 mb-5">
                <h6>Sepertinya kamu nyasar nih ...</h6>
                <p class="fs-sm text-gray">Halaman yang Anda cari mungkin telah dihapus atau tidak tersedia untuk <br> sementara waktu.</p>
                {{-- <a href="/" class="btn btn-primary border-0 rounded-1 mt-4 fs-sm">Kembali ke halaman utama</a> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>