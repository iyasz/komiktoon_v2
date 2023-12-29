<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komiktoon | Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/maskot/fav-icon.png')}}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/contribute.css')}}">
  </head>
  <body>  
    
    
      <div class='container-fluid' >
        <div class="">
          <div class='ps-0 offcanvas panel_left' tabindex="-1" id="sidebarPanel" data-bs-toggle="sidebarPanel" >
            <div class="wrapper-content vh-100">
                <div class="header_siderbar d-flex justify-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="85%" version="1.1" viewBox="0.00 0.00 1440.00 296.00">
                    <path fill="#ef6864" d="   M 112.92 92.65   Q 143.72 52.96 174.42 13.13   C 177.44 9.20 181.15 7.68 186.30 7.70   Q 212.28 7.78 237.13 7.76   Q 238.50 7.76 239.96 8.03   Q 242.56 8.51 241.29 10.83   C 239.78 13.58 238.18 16.32 236.28 18.83   Q 204.23 61.13 173.40 101.68   A 2.90 2.89 -43.2 0 0 173.29 105.05   Q 209.04 158.83 246.89 215.84   Q 248.34 218.03 249.00 220.49   A 1.93 1.93 0.0 0 1 247.16 222.92   Q 219.32 223.19 191.25 222.99   Q 187.95 222.97 185.28 220.23   C 183.06 217.95 180.97 215.64 179.14 212.98   Q 162.12 188.38 146.74 163.53   Q 139.49 151.81 131.41 139.80   A 0.77 0.77 0.0 0 0 130.19 139.72   L 113.74 158.62   Q 113.12 159.34 113.07 160.29   C 112.79 166.95 112.39 173.83 112.42 180.37   Q 112.57 206.38 112.24 217.06   C 112.17 219.40 110.72 222.02 108.20 222.53   Q 106.17 222.95 104.14 222.96   Q 85.39 223.10 64.19 223.01   Q 61.14 222.99 58.35 221.57   Q 57.92 221.35 57.69 220.91   Q 56.25 218.09 56.25 214.87   Q 56.25 115.19 56.27 14.88   Q 56.27 10.54 59.81 8.77   Q 61.48 7.94 65.01 7.93   Q 92.70 7.81 104.26 8.02   Q 112.39 8.17 112.41 16.19   Q 112.50 52.38 112.40 92.48   A 0.29 0.29 0.0 0 0 112.92 92.65   Z"/>
                    <path fill="#ef6864" d="   M 371.57 111.21   A 74.90 74.90 0.0 0 1 296.67 186.11   A 74.90 74.90 0.0 0 1 221.77 111.21   A 74.90 74.90 0.0 0 1 296.67 36.31   A 74.90 74.90 0.0 0 1 371.57 111.21   Z   M 296.6519 150.1599   A 38.99 37.25 90.1 0 0 333.9699 111.2350   A 38.99 37.25 90.1 0 0 296.7881 72.1801   A 38.99 37.25 90.1 0 0 259.4701 111.1050   A 38.99 37.25 90.1 0 0 296.6519 150.1599   Z"/>
                    <path fill="#ef6864" d="   M 1065.93 111.22   A 74.90 74.90 0.0 0 1 991.03 186.12   A 74.90 74.90 0.0 0 1 916.13 111.22   A 74.90 74.90 0.0 0 1 991.03 36.32   A 74.90 74.90 0.0 0 1 1065.93 111.22   Z   M 991.0119 150.1699   A 38.99 37.26 90.1 0 0 1028.3399 111.2450   A 38.99 37.26 90.1 0 0 991.1481 72.1901   A 38.99 37.26 90.1 0 0 953.8201 111.1150   A 38.99 37.26 90.1 0 0 991.0119 150.1699   Z"/>
                    <path fill="#ef6864" d="   M 1229.52 111.21   A 74.90 74.90 0.0 0 1 1154.62 186.11   A 74.90 74.90 0.0 0 1 1079.72 111.21   A 74.90 74.90 0.0 0 1 1154.62 36.31   A 74.90 74.90 0.0 0 1 1229.52 111.21   Z   M 1154.5919 150.1599   A 38.99 37.25 90.1 0 0 1191.9099 111.2350   A 38.99 37.25 90.1 0 0 1154.7281 72.1801   A 38.99 37.25 90.1 0 0 1117.4101 111.1050   A 38.99 37.25 90.1 0 0 1154.5919 150.1599   Z"/>
                    <path fill="#ef6864" d="   M 508.91 104.75   Q 498.44 141.34 487.17 179.48   C 486.26 182.59 485.29 184.01 482.04 184.02   Q 469.34 184.06 457.66 183.80   A 4.10 4.09 82.5 0 1 453.81 180.84   L 431.89 105.27   Q 431.49 103.90 431.33 105.32   Q 427.21 142.08 422.90 180.07   Q 422.47 183.93 418.61 183.96   Q 405.74 184.07 392.91 184.00   C 389.55 183.98 385.83 184.09 386.31 179.30   Q 392.47 118.00 400.31 42.55   Q 400.64 39.36 403.51 38.50   Q 404.09 38.32 408.00 38.33   Q 422.83 38.34 436.25 38.39   C 438.82 38.39 442.34 38.16 443.30 41.34   Q 456.84 86.12 470.11 130.76   Q 470.27 131.30 470.43 130.76   Q 483.73 86.57 496.80 43.51   C 497.54 41.09 498.83 38.44 501.41 38.42   Q 519.03 38.28 535.08 38.35   C 536.95 38.36 539.00 38.77 539.70 40.79   Q 540.54 43.23 540.79 45.62   Q 547.61 111.01 554.38 177.78   Q 554.62 180.16 554.03 182.40   Q 553.90 182.88 553.47 183.14   Q 552.18 183.93 550.71 183.95   Q 539.28 184.16 526.76 183.91   Q 523.87 183.85 520.76 183.57   A 3.18 3.17 89.4 0 1 517.90 180.76   L 509.36 104.79   Q 509.23 103.64 508.91 104.75   Z"/>
                    <rect fill="#ef6864" x="581.51" y="38.38" width="37.92" height="145.64" rx="4.49"/>
                    <path fill="#ef6864" d="   M 700.24 127.36   L 688.89 140.49   Q 688.54 140.89 688.50 141.42   C 687.65 153.96 687.92 166.80 688.03 178.98   Q 688.07 183.94 683.02 183.98   Q 668.70 184.07 654.78 183.98   Q 650.02 183.95 650.02 179.20   Q 649.97 109.69 650.02 43.06   C 650.02 40.54 651.72 38.47 654.30 38.43   Q 669.66 38.24 683.28 38.40   C 685.72 38.43 688.01 40.65 688.01 43.00   Q 688.02 68.21 688.02 94.61   Q 688.02 96.31 689.06 94.96   Q 708.83 69.27 729.82 42.14   C 732.19 39.08 734.46 38.19 738.54 38.20   Q 756.69 38.23 774.18 38.31   Q 775.86 38.32 775.31 39.91   Q 774.49 42.29 772.90 44.39   Q 750.88 73.52 729.47 101.62   Q 728.46 102.94 729.39 104.33   Q 754.35 141.83 779.56 179.89   Q 780.39 181.13 780.47 182.57   A 1.33 1.32 88.2 0 1 779.15 183.98   Q 758.72 184.06 741.59 184.00   C 738.36 183.98 736.10 181.13 734.02 178.25   Q 727.37 169.02 721.10 159.19   Q 711.32 143.85 700.86 127.41   Q 700.58 126.97 700.24 127.36   Z"/>
                    <path fill="#ef6864" d="   M 869.08 71.99   Q 867.67 71.99 867.67 73.40   Q 867.73 127.45 867.63 178.76   Q 867.62 183.89 862.73 183.95   Q 849.48 184.12 836.52 183.97   C 832.79 183.93 829.95 183.75 829.94 179.03   Q 829.93 174.77 829.90 170.25   Q 829.53 125.96 829.80 72.73   A 0.73 0.73 0.0 0 0 829.07 72.00   Q 810.78 72.03 796.24 71.97   Q 791.39 71.95 791.32 66.88   Q 791.13 54.68 791.32 42.82   C 791.39 38.47 795.63 38.37 798.76 38.37   Q 848.66 38.29 898.49 38.36   C 902.05 38.37 906.15 38.30 906.22 43.15   Q 906.37 54.72 906.18 65.49   C 906.13 68.34 905.48 71.98 901.75 71.99   Q 886.13 72.05 869.08 71.99   Z"/>
                    <path fill="#ef6864" d="   M 1288.21 97.04   Q 1287.14 95.27 1287.14 97.34   Q 1287.11 138.63 1287.13 179.00   Q 1287.13 180.79 1286.15 182.73   Q 1285.92 183.19 1285.43 183.36   C 1284.47 183.71 1283.51 184.05 1282.47 184.05   Q 1269.71 184.01 1256.01 184.01   Q 1253.96 184.01 1252.02 183.19   Q 1251.44 182.95 1251.22 182.36   Q 1250.44 180.23 1250.44 177.00   Q 1250.45 111.11 1250.38 43.75   C 1250.38 40.28 1252.09 38.34 1255.43 38.34   Q 1272.03 38.35 1286.09 38.34   C 1290.97 38.34 1292.64 42.07 1294.87 45.65   Q 1317.44 81.79 1341.17 119.74   Q 1341.84 120.80 1341.83 119.55   Q 1341.77 81.20 1341.86 43.54   Q 1341.87 38.40 1347.16 38.38   Q 1359.87 38.31 1373.76 38.38   C 1379.35 38.41 1378.84 42.85 1378.84 47.61   Q 1378.88 114.77 1378.97 174.75   Q 1378.98 177.95 1378.64 180.92   C 1378.31 183.83 1375.46 184.02 1373.19 184.01   Q 1357.70 183.98 1344.05 184.03   Q 1341.12 184.04 1339.52 181.45   Q 1316.92 144.82 1288.21 97.04   Z"/>
                    <path fill="#ef6864" d="   M 1012.81 271.72   Q 985.60 256.20 969.21 228.74   C 962.50 217.51 971.45 203.84 984.50 206.16   Q 991.11 207.33 995.53 214.49   C 1031.11 272.06 1114.22 271.71 1149.43 214.19   C 1153.17 208.08 1157.98 204.14 1165.28 204.81   C 1170.08 205.24 1174.80 208.17 1176.86 212.48   Q 1180.56 220.21 1176.39 227.46   C 1143.67 284.39 1070.53 304.64 1012.81 271.72   Z"/>
                    </svg>
                </div>
                <div class="menuList">
                  <div class="text-center">
                    <a href="/contribute/content/create" class="btn btn-primary w-90 border-0 rounded-1 py-3 fs-sm fw-600">
                      <i class="bi bi-plus-lg"></i> <span class="ms-2">Buat Karya</span></a>
                  </div>
                  
                  <ul class='p-0 mt-3'>
                    <li class='d-flex justify-content-center'>
                      <a href="/contribute/dashboard" class="navMenuButton">
                        <i class="bi bi-grid me-1"></i> <span class='ms-2 fs-sm'>Dashboard</span></a>
                    </li>
                    <li class='d-flex justify-content-center mt-1'>
                      <a href="/contribute/content" class="navMenuButton ">
                        <i class="bi bi-feather me-1"></i> <span class='ms-2 fs-sm'> Karyaku</span></a>
                    </li>
                    <li class='d-flex justify-content-center mt-1'>
                      <a href="/admin/transaction" class="navMenuButton ">
                        <i class="bi bi-graph-up-arrow me-1"></i> <span class='ms-2 fs-sm'> Penarikan</span></a>
                    </li>
                    <li class='d-flex justify-content-center'>
                      <a href="/admin/report" class="navMenuButton">
                        <i class="bi bi-clipboard-pulse me-1"></i> <span class='ms-2 fs-sm'> Laporan</span></a>
                      </li>
                      <li class='d-flex justify-content-center'>
                        <a href="/admin/report" class="navMenuButton">
                          <i class="bi bi-exclamation-triangle me-1"></i> <span class='ms-2 fs-sm'> Peringatan</span></a>
                      </li>
                    <li class='d-flex justify-content-center'>
                      <a href="/admin/report" class="navMenuButton">
                        <i class="bi bi-check2-square me-1"></i> <span class='ms-2 fs-sm'> Kontrak</span></a>
                    </li>
                  </ul> 

                  <div class="position-absolute w-100 left-0" style="bottom: 10px;">
                    <li class='d-flex justify-content-center'>
                      <a href="/" class="navMenuButton">
                        <i class="bi bi-chevron-left me-1"></i> <span class='ms-2 fs-sm'>Kembali</span>
                      </a>
                    </li>
                  </div>
            
                </div>
              </div>
            </div>
            <div class='panel_right'>

              <nav class="navbar navbar-expand-md shadow-sm">
                <div class="container-fluid ">
                  <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarPanel">
                    <span class="navbar-toggler-icon fs-sm"></span>
                  </button>

                    <ul class="navbar-nav ms-auto me-2 mt-1">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fs-sm text-dark" href="#" role="button" data-bs-toggle="dropdown">
                          Yasz Avellia
                        </a>
                          <ul class="dropdown-menu dropdown-menu-end border-0 position-absolute w-100">
                            <li class=" py-2 d-flex ms-4">
                              <img src="{{asset('img/maskot/face.png')}}" class="me-3" width="34px" height="34px" alt=""> 
                              <div class="">
                                <span class="fs-sm ellipsis-text">{{Auth::user()->name}}</span>
                                <p class="mb-0 fs-s-sm text-gray">Member</p>
                              </div>
                            </li>
                            <hr class="my-2">
                            <li><a href="/cart" class="dropdown-item py-2 opacity-75 fs-s-sm">
                              <i class="bi bi-person mx-3"></i> Akun Saya</a></li>
                            <hr class="my-2">
                            <li><a href="/logout" class="dropdown-item py-2 opacity-75 fs-s-sm">
                              <i class="bi bi-box-arrow-right mx-3"></i> Logout</a></li>
                          </ul>
                      </li>
                    </ul>

                </div>
              </nav>

              @yield('content')

          </div>
        </div>
      </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="{{asset('js/main.js')}}"></script>

    @stack('javascript')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>