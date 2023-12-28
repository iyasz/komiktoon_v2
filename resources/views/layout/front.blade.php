<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Komiktoon | Tempat membaca komik setiap hari</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/maskot/fav-icon.png')}}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @stack('css')
    <link rel="stylesheet" href="{{asset('css/front.css')}}">

  </head>
  <body>  

    <nav class="navbar bg-white navbar-expand-lg py-3 border-bottom">
        <div class="container-fluid mx-lg-2 mx-md-4 mx-2">

          <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#SidebarPage" aria-controls="SidebarPage" aria-label="Toggle navigation">
         
            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#ef6864" class="bi bi-three-dots" viewBox="0 0 16 16">
                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
            </svg>
          </button>
          <a class="navbar-brand me-auto ms-3 pb-0" href="/">
            <svg xmlns="http://www.w3.org/2000/svg" class="d-lg-block d-none" width="190px" version="1.1" viewBox="0.00 0.00 1440.00 296.00">
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
                <svg xmlns="http://www.w3.org/2000/svg" class="d-lg-none d-block" width="75px" version="1.1" viewBox="0.00 0.00 816.00 320.00">
                    <path fill="#ef6864" d="   M 70.21 101.22   Q 70.97 100.68 71.53 99.96   Q 104.20 57.80 141.69 9.29   C 144.76 5.33 149.02 3.73 154.04 3.73   Q 182.78 3.69 213.27 3.73   Q 215.58 3.74 217.64 4.20   A 1.46 1.46 0.0 0 1 218.64 6.26   Q 216.35 11.04 212.76 15.79   Q 148.72 100.59 148.56 100.78   Q 146.22 103.35 143.81 106.06   Q 141.04 109.19 139.42 111.69   A 2.05 2.05 0.0 0 0 139.43 113.96   Q 182.85 179.35 224.61 242.35   Q 226.29 244.87 227.18 247.79   A 1.64 1.64 0.0 0 1 226.40 249.71   Q 225.01 250.47 223.33 250.47   Q 195.57 250.58 161.19 250.48   C 158.54 250.47 155.50 249.39 153.65 247.34   C 151.19 244.60 148.74 242.07 146.66 238.98   C 138.22 226.38 129.64 214.33 121.76 201.64   Q 104.63 174.05 91.71 154.65   A 0.87 0.86 48.6 0 0 90.34 154.56   L 71.13 176.63   A 2.27 2.14 68.0 0 0 70.59 178.01   C 70.19 187.62 69.73 197.25 69.79 206.87   Q 69.94 228.21 69.64 243.39   C 69.59 246.20 67.96 249.27 64.92 249.87   Q 61.99 250.45 59.13 250.46   Q 36.19 250.59 14.55 250.49   Q 11.10 250.47 7.73 248.90   Q 7.28 248.69 7.04 248.25   Q 5.25 244.94 5.25 241.94   Q 5.24 128.52 5.23 14.60   C 5.23 8.97 6.31 4.09 13.00 3.99   Q 33.63 3.68 58.07 3.83   C 62.37 3.85 67.04 4.29 68.97 8.62   Q 69.76 10.40 69.79 15.49   Q 70.04 58.72 69.73 100.97   Q 69.73 101.57 70.21 101.22   Z"/>
                    <path fill="#ef6864" d="   M 484.81 133.46   A 75.92 75.92 0.0 0 1 408.89 209.38   A 75.92 75.92 0.0 0 1 332.97 133.46   A 75.92 75.92 0.0 0 1 408.89 57.54   A 75.92 75.92 0.0 0 1 484.81 133.46   Z   M 409.0084 172.5399   A 39.21 37.62 89.9 0 0 446.5599 133.2643   A 39.21 37.62 89.9 0 0 408.8716 94.1201   A 39.21 37.62 89.9 0 0 371.3201 133.3957   A 39.21 37.62 89.9 0 0 409.0084 172.5399   Z"/>
                    <path fill="#ef6864" d="   M 545.22 203.21   C 540.62 201.06 534.47 197.86 529.97 194.32   Q 524.30 189.85 522.06 187.58   Q 518.13 183.58 514.33 178.75   C 500.79 161.53 496.48 139.47 500.51 117.70   Q 501.77 110.91 504.49 104.97   Q 508.85 95.49 512.52 90.73   Q 515.19 87.28 518.11 83.64   C 522.34 78.35 527.49 73.75 533.06 70.34   C 538.17 67.22 543.83 64.05 549.64 62.10   Q 555.92 59.98 560.89 58.87   Q 574.38 55.86 588.81 58.60   Q 593.63 59.52 601.47 62.03   Q 605.37 63.28 608.55 65.03   C 611.47 66.65 614.65 68.05 617.41 69.82   Q 630.92 78.51 639.21 91.58   Q 641.27 94.83 644.64 101.25   C 651.67 114.61 653.65 130.12 651.27 145.10   Q 650.65 149.00 649.32 153.08   C 648.12 156.77 647.22 160.66 645.46 164.19   C 640.98 173.15 636.27 181.37 628.73 188.04   C 624.20 192.05 619.25 196.34 613.74 199.16   C 610.41 200.86 607.26 202.81 603.73 204.22   Q 595.58 207.49 588.57 208.33   Q 584.54 208.82 580.18 209.22   C 568.28 210.32 555.53 208.01 545.22 203.21   Z   M 575.8945 172.6490   A 39.32 38.15 89.6 0 0 613.7691 133.0637   A 39.32 38.15 89.6 0 0 575.3455 94.0110   A 39.32 38.15 89.6 0 0 537.4709 133.5963   A 39.32 38.15 89.6 0 0 575.8945 172.6490   Z"/>
                    <path fill="#ef6864" d="   M 243.67 93.92   Q 229.93 93.91 212.79 93.97   C 208.48 93.99 205.24 93.65 205.25 88.32   Q 205.27 76.75 205.23 65.20   Q 205.22 63.04 206.10 61.28   Q 206.33 60.83 206.80 60.64   Q 209.45 59.53 211.98 59.53   Q 262.92 59.46 315.05 59.53   C 318.58 59.53 322.65 59.62 322.70 64.33   Q 322.84 76.18 322.72 87.25   Q 322.69 89.92 321.42 92.47   A 1.49 1.48 -88.0 0 1 320.71 93.14   Q 318.82 93.98 316.42 93.97   Q 299.80 93.91 284.06 93.93   A 0.61 0.61 0.0 0 0 283.45 94.53   C 282.89 130.67 283.30 166.73 283.28 202.50   C 283.28 207.43 279.16 207.42 275.56 207.43   Q 264.74 207.45 252.81 207.49   C 249.21 207.50 244.93 207.59 244.80 202.78   Q 244.63 195.94 244.59 189.20   Q 244.34 139.01 244.55 94.81   A 0.89 0.88 90.0 0 0 243.67 93.92   Z"/>
                    <path fill="#ef6864" d="   M 710.73 117.40   C 710.58 118.29 710.98 119.02 710.97 119.88   Q 710.85 160.20 710.88 202.76   Q 710.89 207.33 706.38 207.38   Q 689.89 207.57 679.24 207.38   Q 677.25 207.34 675.23 206.63   A 1.43 1.38 83.9 0 1 674.50 206.02   Q 673.49 204.25 673.48 202.19   Q 673.45 131.73 673.48 64.90   Q 673.48 59.56 678.84 59.54   Q 693.07 59.48 709.59 59.50   Q 714.19 59.51 716.63 63.43   Q 728.15 81.97 739.52 100.09   C 741.49 103.23 743.85 106.10 745.86 109.28   Q 756.08 125.49 766.22 141.69   Q 766.87 142.73 766.87 141.50   Q 766.84 103.03 766.90 64.75   Q 766.91 59.54 772.39 59.52   Q 785.76 59.46 798.02 59.54   C 805.53 59.59 804.61 63.10 804.63 68.85   Q 804.83 135.18 804.73 200.75   Q 804.73 203.31 804.13 205.50   Q 803.99 206.00 803.56 206.27   Q 802.05 207.19 800.12 207.22   Q 777.72 207.50 769.36 207.40   Q 765.83 207.36 763.85 204.08   Q 737.30 160.20 711.27 117.30   Q 710.85 116.61 710.73 117.40   Z"/>
                    <path fill="#ef6864" d="   M 519.88 308.60   C 483.55 316.70 444.30 306.39 416.40 282.15   C 414.03 280.10 412.27 277.64 410.09 275.42   Q 399.26 264.32 392.25 251.82   C 387.36 243.11 391.78 232.56 401.46 230.05   C 405.15 229.09 411.09 229.60 413.73 232.98   C 414.85 234.42 416.25 235.72 417.22 237.25   C 426.04 251.18 437.01 262.39 451.41 270.17   C 492.78 292.53 543.15 280.21 569.48 241.48   C 572.97 236.36 575.24 231.09 581.78 229.09   C 594.61 225.16 605.05 238.48 599.20 250.24   Q 597.19 254.28 594.79 257.77   Q 566.93 298.11 519.88 308.60   Z"/>
                </svg>
          </a>

        <div class="position-relative d-lg-none d-block">
            <button class="btn btn-primary border-0 bg-transparent p-0" id="mobileSearchContent">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 20">
                    <path fill="#ef6864" d="M20.258 18.98l-4.967-4.86a8.388 8.388 0 0 0 2.14-5.592C17.43 3.823 13.518 0 8.714 0 3.907 0 0 3.827 0 8.528c0 4.7 3.911 8.527 8.715 8.527 2.184 0 4.183-.789 5.715-2.093l4.967 4.86a.623.623 0 0 0 .43.178.604.604 0 0 0 .431-.177.59.59 0 0 0 0-.843zM1.219 8.528c0-4.045 3.363-7.33 7.492-7.33 4.133 0 7.49 3.29 7.49 7.33s-3.357 7.335-7.49 7.335c-4.13 0-7.492-3.29-7.492-7.335z"/>
                </svg>
            </button>
            <a href="/favorit" class="btn btn-primary border-0 bg-transparent p-0 mx-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20">
                    <path fill="none" fill-rule="evenodd" stroke="#ef6864" d="M10.976 4.294C12.324 2.098 13.905 1 15.718 1c2.72 0 4.521 2.248 4.891 3.294.37 1.046.99 3.818-.998 7.717-1.987 3.9-7.166 6.989-8.635 6.989-1.468 0-6.897-3.504-8.662-6.989-1.765-3.484-1.42-6.51-.865-7.717C2.003 3.087 3.583 1 6.183 1c1.733 0 3.33 1.098 4.793 3.294z"/>
                </svg>
            </a>
            <a href="/history" class="btn btn-primary border-0 bg-transparent p-0">                
                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#ef6864" class="bi bi-clock-history" viewBox="0 0 16 16">
                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483m.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535m-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
                </svg>
            </a>
        </div>

          <div class="offcanvas offcanvas-start" tabindex="-1" id="SidebarPage" aria-labelledby="SidebarPageLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="SidebarPageLabel">
                     <svg xmlns="http://www.w3.org/2000/svg" width="160px" version="1.1" viewBox="0.00 0.00 1440.00 296.00">
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
              </h5>
              <button type="button" class="btn-close fs-sm " data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body">

                <ul class="navbar-nav ms-lg-4 ms-2">
                        <div class="d-lg-none d-flex align-items-center align-content-center">
                            <img src="{{ Auth::user() && Auth::user()->photo ? Storage::url(Auth::user()->photo) : asset('img/maskot/face.png')}}" class="rounded-circle me-3 profile-img" width="50" height="50" alt="">
                            <div>
                                <span class="fw-500 ellipsis-text text-gray">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</span>
                                @if(Auth::user())
                                    <p class="mb-0 fs-s-sm text-gray">Member</p>
                                @else
                                    <a href="{{Route('login')}}" class="btn btn-primary btn-sm fs-s-sm border-0 rounded-1">Masuk</a>
                                @endif
                            </div>
                            @if(Auth::user())
                            <a class="ms-auto me-3" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="26" fill="#ef6864" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                </svg>
                            </a>
                            @endif
                       
                        </div>                        
                        <hr class="d-lg-none d-block">    
                        <li class="nav-item mx-lg-2 mx-0">
                            <a href="" class="nav-link fw-500 d-inline-flex"><i class="bi bi-house me-3 d-lg-none d-inline"></i> Beranda</a>
                        </li>
                        <hr class="d-lg-none d-block">    
                        <li class="nav-item mx-lg-2 mx-0">
                            <a href="" class="nav-link fw-500 d-inline-flex"><i class="bi bi-star me-3 d-lg-none d-inline"></i> Populer</a>
                        </li>
                        <hr class="d-lg-none d-block">    
                        <li class="nav-item mx-lg-2 mx-0 ">
                            <a href="" class="nav-link fw-500 d-inline-flex"><i class="bi bi-grid me-3 d-lg-none d-inline"></i> Genre</a>
                        </li>
                        <hr class="d-lg-none d-block">    
                        <li class="nav-item mx-lg-2 mx-0 ">
                            <a href="" class="nav-link fw-500 d-inline-flex"><i class="bi bi-megaphone me-3 d-lg-none d-inline"></i> Event</a>
                        </li>
                        <hr class="d-lg-none d-block">
                        @if(Auth::user())
                        <li class="nav-item mx-lg-2 mx-0 d-lg-none d-block">
                            <a href="{{route('logout')}}" class="nav-link fw-500 d-inline-flex"><i class="bi bi-box-arrow-right me-3 d-lg-none d-inline"></i> Logout</a>
                        </li>
                        <hr class="d-lg-none d-block">
                        @endif
                    </ul>
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item me-3 my-auto position-relative d-lg-block d-none">
                            <button class="btn btn-primary rounded-circle py-1 px-2 py-auto bg-transparent text-primary border-primary" data-bs-toggle="collapse" data-bs-target="#collapseSearchLarge" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                </svg>
                            </button>

                            <div class="position-absolute collapseSearchLarge">
                                <div class="collapse collapse-horizontal" id="collapseSearchLarge">
                                    <div class="" style="width: 250px;">
                                        <form class="d-flex border-1 border rounded-pill w-100" action="/search" method="get" role="search">
                                            <input class="form-control fs-s-sm border-0 rounded-pill text-gray" name="q" autocomplete="off" type="search" placeholder="Lagi mau baca apa hari ini?">
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <div class="me-3 d-lg-block d-none my-auto opacity-25">|</div>

                        @if (Auth::user())   
                        <li class="nav-item dropdown my-auto d-lg-block d-none">
                            <a class="nav-link fs-sm py-0 text-gray" href="/anime" role="button" data-bs-toggle="dropdown"  aria-expanded="false">
                                <div class="d-flex align-items-center"><img src="{{ Auth::user()->photo ? Storage::url(Auth::user()->photo) : asset('img/maskot/face.png')}}" class="rounded-circle me-3" width="35" height="35" alt=""><span class="mt-2 ellipsis-text">{{ Auth::user()->name}} </span></div>
                            </a>
                              <ul class="dropdown-menu dropdown-menu-end border-0 position-absolute w-100 mt-3">
                                  <li class=" py-2 d-flex ms-4">
                                    <img src="{{asset('img/maskot/face.png')}}" class="me-3" width="40px" height="40px" alt=""> 
                                    <div>
                                      <span class="fs-sm fw-500 ellipsis-text">{{Auth::user()->name}}</span>
                                      <p class="mb-0 fs-s-sm text-gray">Member</p>
                                    </div>
                                  </li>
                                  <hr class="my-2">
                                  <li><a href="/cart" class="dropdown-item py-2 opacity-75 fs-s-sm"><i class="bi bi-person mx-3"></i> Akun Saya</a></li>
                                  <li><a href="/wishlist" class="dropdown-item py-2 opacity-75 fs-s-sm"><i class="bi bi-heart mx-3"></i> Favorit</a></li>
                                  <li><a href="/order" class="dropdown-item py-2 opacity-75 fs-s-sm"><i class="bi bi-clock-history mx-3"></i> Riwayat Baca</a></li>
                                  <hr class="my-2">
                                  <li><a href="/logout" class="dropdown-item py-2 opacity-75 fs-s-sm"><i class="bi bi-box-arrow-right mx-3"></i> Logout</a></li>
                            </ul>
                        </li>

                        @else
                        <li class="nav-item my-auto auth-btn-group d-lg-block d-none">
                            <a href="{{route('login')}}" class="btn btn-primary bg-transparent border-primary text-primary   fs-sm py-2 px-3 rounded-2 fw-500 me-2">Masuk</a>
                            <a href="{{route('register')}}" class="btn btn-primary fs-sm border-0 py-2 px-3 rounded-2 fw-500">Daftar</a>
                        </li>
                        @endif
                    </ul>

            </div>

          </div>
        </div>
    </nav>
    

    @yield('content')

    <div class="__modal-search-content__">
        <div class="header vw-100 bg-white py-2 shadow-sm">
            <div class="container">
                <div class="row">
                    <div class="col-1 my-auto">
                        <button class="bg-transparent border-0"><i class="bi bi-chevron-left color-primary"></i></button>
                    </div>
                    <div class="col-11 px-2">
                        <form action="/search" class="">
                            <input type="text" placeholder="Lagi mau baca apa hari ini?" autocomplete="off" name="q" class="form-control text-gray border-0 fs-sm">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="mt-4 ms-3">
                    <p class="text-dark fs-sm mb-2">Riwayat</p>
                    <ul class="opacity-50 fs-s-sm"></ul>
                </div>
            </div>
        </div>  
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

    $(document).ready(function () {

        $(".__modal-search-content__").hide();

        $("#mobileSearchContent").click(function () {
            $(".__modal-search-content__").show();
            $("body").css("overflow", "hidden");
            $("body").css("padding-right", "15px");
            
            setTimeout(() => {
                $(".__modal-search-content__").css("opacity", "1");
            }, 10);
            
        });

        $(".__modal-search-content__ .header .container .row .col-1 button").on("click", function () {
                $(".__modal-search-content__").css("opacity", "0");
                
                setTimeout(() => {
                    $("body").removeAttr('style');
                    $(".__modal-search-content__").hide();
                }, 600);
        });


        // riwayat 

        const formDataArray = JSON.parse(localStorage.getItem('formData'));

        if(formDataArray != null){
            formDataArray.slice(-7).reverse().forEach(item => {
                $('.__modal-search-content__ .content .container ul').append(`<li class="mb-2">${item.q}</li>`);
            });
        }

        // end riwayat  
        
        // insert riwayat 
        
        $('.__modal-search-content__ .header .container .row form, #collapseSearchLarge form').on('submit', function(e) {
            
            const formData = new FormData(e.target);
            const formDataObject = {};  
            
            formData.forEach((value, key) => {
                formDataObject[key] = value;
            });
            
            let existingData = localStorage.getItem('formData');
            existingData = existingData ? JSON.parse(existingData) : [];
            
            existingData.push(formDataObject);
            localStorage.setItem('formData', JSON.stringify(existingData));

            if(formDataArray.length >= 7){
                formDataArray.shift();
                localStorage.setItem('formData', JSON.stringify(formDataArray));
            }
            
            // end insert riwayat 

        });
    });

    </script>
    
    <script src="{{asset('js/main.js')}}"></script>

    @stack('javascript')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>