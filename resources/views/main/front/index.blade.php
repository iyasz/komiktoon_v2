@extends('layout.front')

@section('content')
    <section id="hero-content-section" style="background-image: url('{{ asset('img/template/bg.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wrapper-banner">
                        <div class="big_banner">
                            <a href="/komik/steel-eating-player/list" class="d-block">
                                <img src="{{asset('img/template/banner_home.png')}}" alt="big-banner">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-white">
        <div class="container">
            <div class="row flex-nowrap overflow-auto">
                <div class="col-12">
                    <ul class="nav nav-pills nav-day justify-content-center" id="pills-tab" role="tablist">
                        @foreach ($days as $item)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link py-4 px-5 rounded-0 {{$item == $today ? 'active' : ''}}" id="pills-{{$item}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$item}}" type="button" role="tab" aria-controls="pills-{{$item}}" aria-selected="true">{{$item}}</button>
                        </li>
                        @endforeach
                      
                </div>
            </div>
        </div>
    </div>
    <section id="content">
        <div class="container mt-5">
                @foreach ($days as $item)
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade {{$item == $today ? 'show active' : ''}}" id="pills-{{$item}}" role="tabpanel" aria-labelledby="pills-{{$item}}-tab" tabindex="0">
                        <div class="row">
                        @foreach (getContentUseWeek($item) as $data)
                            @php
                            $likeCountAll = $data->chapters->sum(function ($chapter) {
                                    return $chapter->likes->count();
                                });
                            @endphp
                            <div class="col-auto mb-3 pe-md-1 pe-0">
                                <a href="/komik/{{$data->slug}}/list" class="contentContainer">
                                    <div class="card_front">
                                        <img src="{{ Storage::url($data->thumbnail) }}" class=""  alt="">
                                        <div class="info">
                                            <p class="subj">{{$data->title}}</p>
                                            <div class="grade-area">
                                                <i class="bi bi-heart-fill text-primary"></i>
                                                <p class="mb-0 ms-2">{{ number_format($likeCountAll) }}</p>
                                            </div>
                                            @if ($data->created_at >  \Carbon\Carbon::now()->subWeek())
                                            <div class="badge-icon">
                                                <img src="{{asset('img/template/new_st.png')}}" alt="status" width="30">
                                            </div>
                                            @elseif($data->chapters()->whereDate('created_at', '>', now()->subDays(3))->exists())
                                            <div class="badge-icon">
                                                <img src="{{asset('img/template/up_st.png')}}" alt="status" width="30">
                                            </div>
                                            @elseif($data->is_ongoing == 2)
                                            <div class="badge-icon">
                                                <img src="{{asset('img/template/end_st.png')}}" alt="status" width="30">
                                            </div>
                                            @endif
                                        </div>
                                        <p class="content_genre">{{ $data->genreDetail->first()->genre->name }}</p>
                                    </div>
                                    <div class="card_back">
                                        <div class="info">
                                            <p class="subj">{{$data->title}}</p>
                                            <div class="creator-name">
                                                <p>{{$data->author}}</p>
                                            </div>
                                            <p class="line-content"></p>
                                            <div class="content-desc">
                                                <p>{{$data->synopsis}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                @endforeach
        </div>

        <div class="bg-white my-5 py-5">
            <div class="container">
                <div class="row">   
                    <div class="col-12 text-end">
                        <h1>kanjut</h1>
                        {{-- @foreach ($content->inRandomOrder()->take(1)->get() as $item)
                            <img src="{{Storage::url($item->thumbnail)}}" width="180px" alt="">
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row mb-3">
                        <h4 class="front-title-header">Komik Lainnya</h4>
                    </div>
                    <div class="row">
                        @foreach($content as $data)
                        @php
                        $likeCountAll = $data->chapters->sum(function ($chapter) {
                                return $chapter->likes->count();
                            });
                        @endphp
                        <div class="col-auto mb-3 pe-md-1 pe-0">
                            <a href="/komik/{{$data->slug}}/list" class="contentContainer">
                                <div class="card_front">
                                    <img src="{{ Storage::url($data->thumbnail) }}" class=""  alt="">
                                    <div class="info">
                                        <p class="subj">{{$data->title}}</p>
                                        <div class="grade-area">
                                            <i class="bi bi-heart-fill text-primary"></i>
                                            <p class="mb-0 ms-2">{{ number_format($likeCountAll) }}</p>
                                        </div>
                                        @if ($data->created_at >  \Carbon\Carbon::now()->subWeek())
                                        <div class="badge-icon">
                                            <img src="{{asset('img/template/new_st.png')}}" alt="status" width="30">
                                        </div>
                                        @elseif($data->chapters()->whereDate('created_at', '>', now()->subDays(3))->exists())
                                        <div class="badge-icon">
                                            <img src="{{asset('img/template/up_st.png')}}" alt="status" width="30">
                                        </div>
                                        @elseif($data->is_ongoing == 2)
                                        <div class="badge-icon">
                                            <img src="{{asset('img/template/end_st.png')}}" alt="status" width="30">
                                        </div>
                                        @endif
                                    </div>
                                    <p class="content_genre">{{ $data->genreDetail->first()->genre->name }}</p>
                                </div>
                                <div class="card_back">
                                    <div class="info">
                                        <p class="subj">{{$data->title}}</p>
                                        <div class="creator-name">
                                            <p>{{$data->author}}</p>
                                        </div>
                                        <p class="line-content"></p>
                                        <div class="content-desc">
                                            <p>{{$data->synopsis}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row mb-3 mt-lg-0 mt-3">
                        <h4 class="front-title-header">Most Viewed</h4>
                    </div>
                    <div class="row">
                        @foreach($content->take(5) as $data)
                        @php
                        $likeCountAll = $data->chapters->sum(function ($chapter) {
                                return $chapter->likes->count();
                            });
                        @endphp
                        <div class="col-12 mb-3 ">
                            <a href="/komik/{{$data->slug}}/list" class="d-flex text-decoration-none">
                                <img src="{{Storage::url($data->thumbnail)}}" width="100px" height="100px" class="object-fit-cover" alt="">
                                <div class="ms-3">
                        
                                    <p class="mb-0 fs-s-sm text-gray ">{{ $data->genreDetail->pluck('genre.name')->implode(', ') }}</p>
                                    <p class="text-dark fw-500 mb-1 one-line-text">{{$data->title}}</p>
                                    <p class="fs-s-sm two-line-text text-gray">{{$data->synopsis}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
