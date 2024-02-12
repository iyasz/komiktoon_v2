@extends('layout.contribute')
@section('content-active', 'text-primary')

@section('content')
    <div id="app" class="mb-3">
        <div class="row flex-nowrap overflow-auto">

            <div class="col-lg-4 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <p class="mb-0 fs-sm">Total Komik</p>
                            </div>

                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="icon-dashboard-panel" style="background: #f3ecfd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ac7af3" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                </svg>    
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600">{{number_format($contentCount)}}</p>
                                <p class="fs-s-sm">Jumlah Komik</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 py-3 px-0">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <p class="mb-0 fs-sm">Perlu diupdate</p>
                            </div>

                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="icon-dashboard-panel" style="background: #fdecee">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#f37a88" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                </svg>    
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600">{{number_format($contentConfirmedCount)}}</p>
                                <p class="fs-s-sm">Perlu Diperbaharui</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <p class="mb-0 fs-sm">Komik Terbit</p>
                            </div>

                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="icon-dashboard-panel" style="background: #ecfafd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#75dcf4" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                </svg>    
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600">{{number_format($contentTerbitCount)}}</p>
                                <p class="fs-s-sm">Telah Diterbitkan</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row my-4 my-lg-auto">
            <div class="col-lg-8 col-12 px-3 px-lg-auto ps-lg-3 ps-auto pe-lg-0 pe-auto order-lg-0 order-1">
                <div class="card border-0 rounded-1">
                    <div class="card-body">

                        <div class="border rounded-2">
                            <ul class="nav nav-pills border-bottom mb-3 mx-lg-4 mx-auto" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link border-bottom-white rounded-0 bg-transparent py-3 text-gray fw-400 active" data-bs-toggle="pill" data-bs-target="#pills-draftku" type="button" role="tab" aria-controls="pills-draftku" aria-selected="false">Draft</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link border-bottom-white rounded-0 bg-transparent py-3 text-gray fw-400" data-bs-toggle="pill" data-bs-target="#pills-confirmed" type="button" role="tab" aria-controls="pills-confirmed" aria-selected="false">Confirmed</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link border-bottom-white rounded-0 bg-transparent py-3 text-gray fw-400" data-bs-toggle="pill" data-bs-target="#pills-terbit" type="button" role="tab" aria-controls="pills-terbit" aria-selected="true">Diterbitkan</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link border-bottom-white rounded-0 bg-transparent py-3 text-gray fw-400" data-bs-toggle="pill" data-bs-target="#pills-tolak" type="button" role="tab" aria-controls="pills-tolak" aria-selected="false">Ditolak</a>
                                </li>
                            </ul>

                            <div class="tab-content mx-lg-4 mx-2" id="pills-tabContent">
                                <div class="tab-pane height fade show active" id="pills-draftku" role="tabpanel" tabindex="0">
                                    <div class="table-responsive">
                                        <table class="table border-top">
                                            <tbody>
                                                @if ($draftContent->count() != 0)                                      
                                                @foreach ($draftContent as $data)
                                                <tr>
                                                    <td><img src="{{Storage::url($data->thumbnail)}}" width="170px" class="object-fit-cover" height="170px" alt=""></td>
                                                    <td class="ps-3">
                                                        <div class="d-flex">
                                                            <p class="mb-1 text-gray fs-s-sm ">
                                                                {{$data->genreDetail->pluck('genre.name')->implode(', ')}}
                                                            </p>
                                                            <div class="ms-auto d-flex text-decoration-none">
                                                                <a href="" class="text-gray text-decoration-none">
                                                                    <i class="bi bi-pencil"></i>
                                                                </a>
                                                                <a href="" class="text-gray text-decoration-none mx-2">
                                                                    <i class="bi bi-three-dots"></i>
                                                                </a>
                                                                <form action="/contribute/content/{{$data->slug}}/delete" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" class="border-0 bg-transparent p-0 text-gray text-decoration-none">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <a class="fs-6 text-primary text-decoration-none fw-500">{{$data->title}}</a>
                                                        
                                                        <p class="fs-s-sm text-gray my-2 two-line-text">{!! nl2br(e($data->synopsis)) !!}</p>
                                                        <div class="d-flex">
                                                            <a href="/contribute/content/{{$data->slug}}/chapter" class="btn bg-semi-gray text-gray border-0 me-2 rounded-0 py-2 mt-2 fs-s-sm">Edit Chapter</a>
                                                            <a href="/contribute/chapter/create/{{$data->slug}}" class="btn bg-semi-gray text-gray border-0 rounded-0 py-2 mt-2 fs-s-sm">
                                                                <i class="bi bi-plus-lg"></i> <span class="ms-2">Tambah Chapter</span>
                                                            </a>
                                                        </div>

                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <div class="text-center">
                                                    <img src="{{asset('img/maskot/SearchNotFound.gif')}}" alt="" width="70%" >
                                                    <h6>WADUH, BELUM ADA KARYA DI DRAFT NIH ! ... BUAT YUK !</h6>
                                                </div>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                <div class="tab-pane height fade" id="pills-confirmed" role="tabpanel" tabindex="0">
                                    <div class="table-responsive">
                                        <table class="table border-top">
                                            <tbody>
                                                @if ($confirmedContent->count() != 0)                                      
                                                @foreach ($confirmedContent as $data)
                                                <tr>
                                                    <td><img src="{{Storage::url($data->thumbnail)}}" width="170px" class="object-fit-cover" height="170px" alt=""></td>
                                                    <td class="ps-3">
                                                        <div class="d-flex">
                                                            <p class="mb-1 text-gray fs-s-sm ">
                                                                {{$data->genreDetail->pluck('genre.name')->implode(', ')}}
                                                            </p>
                                                        </div>
                                                        <a class="fs-6 text-primary text-decoration-none fw-500">{{$data->title}}</a>
                                                        
                                                        <p class="fs-s-sm text-gray my-2 two-line-text">{!! nl2br(e($data->synopsis)) !!}</p>
                                                        <div class="d-flex">
                                                            <a href="/contribute/content/update/{{$data->slug}}" class="btn bg-semi-gray text-gray border-0 me-2 rounded-0 py-2 mt-2 fs-s-sm">Update</a>
                                                        </div>

                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <div class="text-center">
                                                    <img src="{{asset('img/maskot/SearchNotFound.gif')}}" alt="" width="70%" >
                                                    <h6>WADUH, BELUM ADA KARYA DI CONFIRM NIH ! ... BUAT YUK !</h6>
                                                </div>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                
                                <div class="tab-pane height fade" id="pills-terbit" role="tabpanel" tabindex="0">
                                    <div class="table-responsive">
                                        <table class="table border-top">
                                            <tbody>
                                                @if ($terbitContent->count() != 0)                                      
                                                @foreach ($terbitContent as $data)
                                                <tr>
                                                    <td><img src="{{Storage::url($data->thumbnail)}}" width="170px" class="object-fit-cover" height="170px" alt=""></td>
                                                    <td class="ps-3">
                                                        <div class="d-flex">
                                                            <p class="mb-1 text-gray fs-s-sm ">
                                                                {{$data->genreDetail->pluck('genre.name')->implode(', ')}}
                                                            </p>
                                                            <div class="ms-auto d-flex text-decoration-none">
                                                                <a href="" class="text-gray text-decoration-none">
                                                                    <i class="bi bi-pencil"></i>
                                                                </a>
                                                                <a href="" class="text-gray text-decoration-none mx-2">
                                                                    <i class="bi bi-three-dots"></i>
                                                                </a>
                                                                <form action="/contribute/content/{{$data->slug}}/delete" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" class="border-0 bg-transparent p-0 text-gray text-decoration-none">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <a href="/komik/{{$data->slug}}/list" class="fs-6 text-primary text-decoration-none fw-500">{{$data->title}}</a>
                                                        
                                                        <p class="fs-s-sm text-gray my-2 two-line-text">{!! nl2br(e($data->synopsis)) !!}</p>
                                                        <div class="d-flex">
                                                            <a href="/contribute/content/{{$data->slug}}/chapter" class="btn bg-semi-gray text-gray border-0 me-2 rounded-0 py-2 mt-2 fs-s-sm">Edit Chapter</a>
                                                            <a href="/contribute/chapter/create/{{$data->slug}}" class="btn bg-semi-gray text-gray border-0 rounded-0 py-2 mt-2 fs-s-sm">
                                                                <i class="bi bi-plus-lg"></i> <span class="ms-2">Tambah Chapter</span>
                                                            </a>
                                                        </div>

                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <div class="text-center">
                                                    <img src="{{asset('img/maskot/SearchNotFound.gif')}}" alt="" width="70%" >
                                                    <h6>WADUH, BELUM ADA KARYA DI TERBITKAN NIH ! ... BUAT YUK !</h6>
                                                </div>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane height fade" id="pills-tolak" role="tabpanel" tabindex="0">
                                    <div class="table-responsive">
                                        <table class="table border-top">
                                            <tbody>
                                                @if ($rejectedContent->count() != 0)                                      
                                                @foreach ($rejectedContent as $data)
                                                <tr>
                                                    <td><img src="{{Storage::url($data->thumbnail)}}" width="170px" class="object-fit-cover" height="170px" alt=""></td>
                                                    <td class="ps-3">
                                                        <div class="d-flex">
                                                            <p class="mb-1 text-gray fs-s-sm ">
                                                                {{$data->genreDetail->pluck('genre.name')->implode(', ')}}
                                                            </p>
                                                            <div class="ms-auto text-decoration-none">
                                                                <form action="/contribute/content/{{$data->slug}}/delete" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" class="border-0 bg-transparent p-0 text-gray text-decoration-none">
                                                                        <i class="bi bi-trash3"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <a class="fs-6 text-primary text-decoration-none fw-500">{{$data->title}}</a>
                                                        
                                                        <p class="fs-s-sm text-gray my-2 two-line-text">{!! nl2br(e($data->synopsis)) !!}</p>
                                                        <div class="d-flex">
                                                            <a data-bs-toggle="modal" data-bs-target="#modalInfo" class="btn bg-semi-gray text-gray border-0 me-2 rounded-0 py-2 mt-2 fs-s-sm">Lihat Alasan</a>
                                                        </div>

                                                    </td>
                                                </tr>

                                                <div class="modal" id="modalInfo" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="text-end mb-3">
                                                                    <button class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="mx-2">
                                                                    <p class="mb-0 opacity-75">Komik :</p>
                                                                    <h3 class="opacity-75 mb-5 fw-400">{{ $data->title }}</h3>
                                            
                                                                    <p class="mb-0 opacity-75">Alasan :</p>
                                                                    <p class="opacity-75 mb-5 h5 fw-400">{{ $data->rejected[0]['reason'] }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach
                                                @else
                                                <div class="text-center">
                                                    <img src="{{asset('img/maskot/SearchNotFound.gif')}}" alt="" width="70%" >
                                                    <h6>WADUH, BELUM ADA KARYA DI TOLAK NIH ! ... BUAT YUK !</h6>
                                                </div>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 mb-3 mb-lg-0 order-lg-1 order-0 px-3">
                <div class="card border-0 rounded-1">
                    <div class="card-body">
                        <div class="">
                            <input type="text" name="" id="searchContent" class="form-control w-100 text-gray mb-3" placeholder="Cari disini ..">
                            <hr>
                            <a href="/contribute/content/create" class="btn btn-primary w-100 border-0 rounded-1 py-3 fs-sm fw-600">
                                <i class="bi bi-plus-lg"></i> <span class="ms-2">Tambah Serial</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('javascript')
    <script>
           $(document).ready(function(){
            $("#searchContent").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".tab-pane.height tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endpush



