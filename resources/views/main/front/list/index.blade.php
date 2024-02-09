@extends('layout.front')

@push('css')
    <style>
        body {
            background-color: #f0f0f0 !important;
        }

        .nav-pills .nav-link.active {
            background-color: transparent;
            color: #818181;
        }

        .nav-pills .nav-link {
            color: #c6c6c6;
        }

        .pagination .page-item {
            margin: auto 4px;
            background-color: transparent !important;
        }

        .pagination .page-item.active > .page-link {
            background: #ef6864 !important;
            color: white;
        }

        .pagination .page-item .page-link {
            border-radius: 50%;
            padding: 5px 15px !important;
            border: none;
            color: black;
        }

        .pagination .page-item .page-link:focus {
            background: transparent;
            box-shadow: none;
        }

        .pagination .page-item .page-link:hover {
            background: transparent;;
        }

        @media (min-width: 1200px){
            .container.detail_list_content, .container.detail_list_content .container.wrapper{
                max-width: 1200px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="modal" id="modalInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-end mb-3">
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="mx-2">
                        <p class="mb-0 opacity-75">Komik :</p>
                        <h3 class="opacity-75 mb-5 fw-400">{{ $content->title }}</h3>

                        <p class="mb-0 opacity-75">Dibuat oleh :</p>
                        <h3 class="opacity-75 mb-5 fw-400">{{ $content->author }}</h3>
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

    <div class="modal" id="ratingModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body p-5">
                    <div class="text-center">
                        <h1 id="ratingValue">{{$ratingStar}}</h1>
                        <p class="fw-300">Klik untuk menentukan rating</p>
                    </div>
                    <div class="text-center">
                        <a class="text-decoration-none cursor-pointer fs-1 mx-1">
                            <i id="str_1" class="bi bi-star-fill rate" style="color: {{$ratingStar >= 1 ? '#ef6864' : '#565656'}};"></i>
                        </a>
                        <a class="text-decoration-none cursor-pointer fs-1 mx-1">
                            <i id="str_2" class="bi bi-star-fill rate" style="color: {{$ratingStar >= 2 ? '#ef6864' : '#565656'}};"></i>
                        </a>
                        <a class="text-decoration-none cursor-pointer fs-1 mx-1">
                            <i id="str_3" class="bi bi-star-fill rate" style="color: {{$ratingStar >= 3 ? '#ef6864' : '#565656'}};"></i>
                        </a>
                        <a class="text-decoration-none cursor-pointer fs-1 mx-1">
                            <i id="str_4" class="bi bi-star-fill rate" style="color: {{$ratingStar >= 4 ? '#ef6864' : '#565656'}};"></i>
                        </a>
                        <a class="text-decoration-none cursor-pointer fs-1 mx-1">
                            <i id="str_5" class="bi bi-star-fill rate" style="color: {{$ratingStar == 5 ? '#ef6864' : '#565656'}};"></i>
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mt-4 mx-3">
                        <button class="btn bg-dark text-white py-3 px-5 border-0 rounded-pill" id="confirmRatingContent" data-bs-dismiss="modal">YA</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="app">
        <div class="wrapper-banner-content" style="background-image: url('{{ asset('img/bg-detail.png') }}');">
            <div class="detail_content position-relative">
                <div class="thumb">
                    <img src="{{ asset('img/people.png') }}" alt="" width="100%" height="250">
                </div>
                <div class="info text-center">
                    <p class="genre mb-0">
                        {{ $content->genreDetail->pluck('genre.name')->implode(', ') }}
                    </p>
                    <h1 class="title text-white">{{ $content->title }}</h1>
                    <p class="creator mb-0 text-white">{{ $content->author }} <a data-bs-toggle="modal" data-bs-target="#modalInfo" class="text-white ms-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" /> </svg></a></p>
                </div>
            </div>
        </div>
        <div class="container detail_list_content px-0 ">
            <div class="content">
                <div class="container wrapper mx-0">
                    <div class="row">
                        <div class="col-8 px-0 left-content-list" style="width: 70.00000000% !important;">
                            <div class="line"></div>
                            <div class="list">
                                <div class="ms-3 mt-2 d-flex align-items-center">
                                    <ul class="nav nav-pills list" id="pills-tab" role="tablist">
                                        <li class="nav-item mx-3" role="presentation">
                                            <button class="nav-link {{ !session('status') ? 'active' : '' }} rounded-0 bg-transparent py-3 px-0 fw-400" data-bs-toggle="pill" data-bs-target="#pills-chapter" type="button" role="tab" aria-controls="pills-chapter" aria-selected="true">Chapter</button>
                                        </li>
                                        <li class="nav-item mx-3 text-primary my-auto">/</li>
                                        <li class="nav-item mx-3" role="presentation">
                                            <button class="nav-link {{ session('status') ? 'active' : '' }} rounded-0 bg-transparent py-3 px-0 fw-400" data-bs-toggle="pill" data-bs-target="#pills-comment" type="button" role="tab" aria-controls="pills-comment" aria-selected="false">Komentar <span class="ms-1 fs-s-sm">({{ number_format($commentCount) }})</span></button>
                                        </li>
                                    </ul>
                                    
                                    

                                    <div class="favorit me-3 ms-auto">
                                        @if (Auth::user())
                                            <button class="btn btn-favorit @if($hasFavorit > 0)active @endif bg-none rounded-pill border fs-sm px-4 py-2" id="favoritAddBtn">
                                                <img id="imgFavoritContent" src="{{ asset('img/maskot/' . ($hasFavorit > 0 ? 'wishlist_active.svg' : 'wishlist.svg')) }}" width="20px" height="20px" class="me-1" alt=""> Favorit
                                            </button>
                                        @else 
                                        <button onclick="window.location.href='/auth/login'" class="btn bg-none rounded-pill border fs-sm px-4 py-2">
                                            <img src="{{ asset('img/maskot/wishlist.svg') }}" width="20px" height="20px" class="me-1" alt=""> Favorit
                                        </button> 
                                        @endif
                                    </div>

                                    
                                </div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade {{ !session('status') ? 'show active' : '' }} pills-tab-chapter" id="pills-chapter" role="tabpanel" aria-labelledby="pills-tab-chapter" tabindex="0">
                                        <div class="list-content">
                                            <ul class="px-3">
                                                <hr class="mb-0 mt-2">
                                                @php
                                                    $likeCountAll = $content->chapters->sum(function ($chapter) {
                                                        return $chapter->likes->count();
                                                    });

                                                    $viewCountAll = $content->chapters->sum(function ($chapter) {
                                                        return $chapter->views->count();
                                                    });

                                                    $currentPage = $content->chapters()->orderBy('created_at', 'desc')->paginate(7);
                                                    $totalItems = $currentPage->total();
                                                    $perPage = 7;
                                                    $initialNumber = $totalItems - ($currentPage->currentPage() - 1) * $perPage;

                                                @endphp
                                                @foreach ($content->chapters()->orderBy('created_at', 'desc')->paginate(7) as $data)
                                                <a class="text-dark" href="/{{ $content->slug }}/{{ $data->slug }}/view">
                                                    <li class="d-flex align-items-center">
                                                        <img src="{{ Storage::url($data->thumbnail) }}" alt="" width="85px" height="85px">
                                                        <p class="mb-0 d-inline ms-3 text-gray title-chapter-limit">{{ $data->title }}</p>
                                                        <div class="ms-auto me-5 d-flex align-items-center">
                                                            <p class="mb-0 opacity-50 fs-s-sm me-5">{{ $data->created_at->format('d M y') }}</p>
                                                            <p class="mb-0 opacity-50 fs-s-sm"><i class="bi bi-heart me-1"></i> {{ number_format($data->likes->count()) }}</p>
                                                        </div>
                                                        <p class="mb-0 me-2">#{{ $initialNumber  }}</p>
                                                    </li>
                                                </a>
                                                <hr class="my-0">
                                                @php
                                                    $initialNumber--;
                                                @endphp
                                                @endforeach
                                            </ul>    
                                            
                                        </div>
                                        <div class="pagination-wrapper">
                                            {{-- {{ $content->chapters()->orderBy('created_at', 'desc')->paginate(1)->withQueryString()->onEachSide(3)->links() }} --}}
                                            {{ $content->chapters()->orderBy('created_at', 'desc')->paginate(7)->onEachSide(1)->withQueryString()->links() }}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade {{ !session('status') ? '' : 'show active' }}" id="pills-comment" role="tabpanel" aria-labelledby="pills-tab-comment" tabindex="0">
                                        <div class="px-3 mt-2">
                                            @if (Auth::user())
                                                <div class="">
                                                    <textarea id="text-area-comment" placeholder="Harap gunakan kolom komentar dengan baik." rows="3" class="form-control rounded-1 fw-300 fs-sm text-gray"></textarea>
                                                    <div class="text-end mb-3">
                                                        <button class="btn btn-dark border-0 rounded-1 fs-s-sm mt-2" id="btnHandleComment">Posting</button>
                                                    </div>
                                                </div>
                                            @endif
                                            <hr class="mb-0 mt-2">
                                            @foreach($getAllComment as $data)
                                            <div class="wrapper-comment my-3">
                                                <div class="d-flex">
                                                    <div class="me-4">
                                                        <img src="{{ $data->user->photo != NULL ? Storage::url($data->user->photo) : asset('img/maskot/pp_default.png')}}" class="rounded-circle object-fit-coover" width="50" height="50" alt="">
                                                    </div>
                                                    <div class="">
                                                        <h6 class="name mb-2 fw-400">{{$data->user->name}}</h6>
                                                        <p class="fs-sm fw-300">{{$data->body}}</p>
                                                        <div class="d-flex">
                                                            <p class="mb-0 fs-s-sm text-gray fw-300">{{$data->created_at->format('d M Y')}}</p>
                                                            @if (Auth::user() && $data->user->id == Auth::user()->id)
                                                            <p class="mb-0 fs-s-sm text-gray fw-300 mx-3">|</p>
                                                            <form action="/{{ request()->path() }}/{{$data->id}}" method="post" class="d-flex">
                                                                @csrf
                                                                @method('delete')
                                                                <button onclick="return confirm('Apakah kamu ingin menghapus komentar ini?')" class="border-0 bg-transparent p-0 fs-s-sm text-gray fw-300"><i class="bi bi-trash"></i></button> 
                                                            </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="mb-0 mt-2">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-4 px-0 right-content-list" style="width: 30.00000000% !important;">
                            <div class="p-4">
                                <ul class="d-flex ps-0">
                                    <li class="view">
                                        <i class="bi bi-eye-fill text-primary"></i> <span class="fw-300 ms-1">{{ number_format($viewCountAll) }}</span>
                                    </li>
                                    <li class="view ms-4">
                                        <i class="bi bi-heart-fill text-primary"></i> <span class="fw-300 ms-1">{{ number_format($likeCountAll) }}</span>
                                    </li>
                                    <li class="rate ms-4">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-star-fill text-primary"></i> <span class="fw-300 ms-1" id="ratigNumber">{{number_format($totalRating, 1)}}</span>
                                        </div>
                                    </li>
                                    <button {{ Auth::user() ? 'data-bs-toggle=modal data-bs-target=#ratingModal' : "onclick=window.location.href='/auth/login'" }} class="btn p-0 border-0 ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil mb-1" viewBox="0 0 16 16"><path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                        </svg>
                                    </button>
                                </ul>
                                <div class="update mt-3 d-flex align-items-center">
                                    <img src="{{ asset('img/maskot/upd_content.png') }}" width="40px" height="40px"
                                        alt="">
                                    <p class="mb-0 fw-500 ms-2">Update KAMIS</p>
                                </div>
                                <div class="desc mt-4">
                                    <p class="mb-0 fs-sm opacity-75">{{ $content->synopsis }}</p>
                                </div>
                                <div class="action mt-5">
                                    <a href="/{{$content->slug}}/{{$firstChapter->slug}}/view" class="btn btn-dark fs-sm w-100 rounded-pill border-0 py-3 d-flex justify-content-between align-items-center">
                                        <span class="mx-auto">Ch. Pertama</span>
                                        <span><i class="bi bi-chevron-right "></i></span>
                                    </a>

                                </div>
                            </div>

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
          $("#str_1").click(function() {
              $(".bi-star-fill.rate").css("color", "#565656");
              $("#str_1").css("color", "#ef6864");
              $('#ratingValue').text('1')
              
            });
            $("#str_2").click(function() {
                $(".bi-star-fill.rate").css("color", "#565656");
                $("#str_1, #str_2").css("color", "#ef6864");
                $('#ratingValue').text('2')
                
            });
            $("#str_3").click(function() {
                $(".bi-star-fill.rate").css("color", "#565656")
                $("#str_1, #str_2, #str_3").css("color", "#ef6864");
                $('#ratingValue').text('3')
                
            });
            $("#str_4").click(function() {
                $(".bi-star-fill.rate").css("color", "#565656");
                $("#str_1, #str_2, #str_3, #str_4").css("color", "#ef6864");
                $('#ratingValue').text('4')
                
            });
            $("#str_5").click(function() {
                $(".bi-star-fill.rate").css("color", "#565656");
                $("#str_1, #str_2, #str_3, #str_4, #str_5").css("color", "#ef6864");
                $('#ratingValue').text('5')

          });
        });
    </script>

    <script>
        $('#favoritAddBtn').on('click', function() {
            var url = window.location.pathname;
            var slug = location.pathname.split("/")[4];

            axios.post(url, slug).then(function(response) {
                var domain = window.location.host;
                var protocol = window.location.protocol;
                if(response.data.res == "create"){
                    $('#imgFavoritContent').attr('src', protocol+'//'+domain+'/img/maskot/wishlist_active.svg');
                    $('#alertModal .modal-content p').html("Favorit berhasil ditambahkan!")
                    $('#alertModal').modal('show')
                    $("#favoritAddBtn").addClass('active')
                }else{
                    $("#favoritAddBtn").removeClass('active')
                    $('#imgFavoritContent').attr('src', protocol+'//'+domain+'/img/maskot/wishlist.svg');
                    $('#alertModal').modal('show')
                    $('#alertModal .modal-content p').html("Favorit berhasil dihapus!")
                }
            }).catch(function(error) {
                console.error(error);
            });
        })

        $('#confirmRatingContent').on('click', function() {
            var url = window.location.pathname;
            var rate = $('#ratingValue').text();

            axios.put(url, { rate: rate }).then(function(response) {
                $('#ratigNumber').text(response.data.data.toFixed(1))
            }).catch(function(error) {
                console.error(error);
            });
        })

        $('#btnHandleComment').on('click', function() {
            if($('#text-area-comment').val() < 1){
                $('#alertModal').modal('show')
                $('#alertModal .modal-content p').html("Komentar tidak boleh kosong!")
                return false;
            }

            if($('#text-area-comment').val().length > 200){
                $('#alertModal').modal('show')
                $('#alertModal .modal-content p').html("Komentar terlalu panjang!")
                return false;
            }
            
            var url = window.location.pathname;
            var comment = $('#text-area-comment').val();
            
            axios.patch(url, { comment: comment }).then(function(response) {
                window.location.reload()
            }).catch(function(error) {
                console.error(error);
            });
        })
    </script>
@endpush
