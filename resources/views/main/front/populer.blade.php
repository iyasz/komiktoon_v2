@extends('layout.front')

@section('content')
    <section id="app-wrapper">
        <div class="">
            <div class="bg-white">
                <div class="container">
                    <ul class="nav nav-pills top mb-3 mx-lg-4 mx-auto justify-content-center flex-nowrap overflow-auto" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="/populer" class="nav-link border-bottom-white rounded-0 bg-transparent py-3 me-3 text-gray fw-400 active" >Populer</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="/genre" class="nav-link border-bottom-white rounded-0 bg-transparent py-3 me-3 text-gray fw-400 " >Genre</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h4 class="fw-500">Populer Minggu Ini</h4>
                    </div>
                    <div class="col-4 me-5">
                        <a href="/komik/{{$topOneContents->slug}}/list" class="d-block text-decoration-none">
                            <div class="pic">
                                <img src="{{Storage::url($topOneContents->thumbnail)}}" alt="" width="100%" class="object-fit-cover">
                            </div>
                            <div class="mt-3">
                                <p class="fs-sm text-gray mb-2">{{ $topOneContents->genreDetail->pluck('genre.name')->implode(', ') }}</p>
                                <h3 class="text-black mb-1">{{$topOneContents->title}}</h3>
                                <p class="fs-sm text-black mb-2">{{ $topOneContents->author }}</p>
                                <p class="fs-s-sm text-black">{{$topOneContents->synopsis}}</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-7">
                        <div class="row">

                            @foreach ($topContents as $item)
                            <div class="col-12 ps-0">
                                <a href="/komik/{{$item->slug}}/list" class="d-block text-decoration-none">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="pic">
                                                <img src="{{Storage::url($item->thumbnail)}}" alt="thumbnail" width="90px">
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <h5 class="mb-0 text-black">{{$loop->iteration + 1}}</h5>
                                        </div>
                                        <div class="col-auto">
                                            <p class="fs-s-sm fw-300 text-gray mb-0">{{ $item->genreDetail->pluck('genre.name')->implode(', ') }}</p>
                                            <p class="h5 fw-400 text-black mb-1">{{ $item->title}}</p>
                                            <p class="fs-s-sm fw-300 text-black mb-1">{{ $item->title}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <hr class="my-2">
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
        
        
    </section>
@endsection
