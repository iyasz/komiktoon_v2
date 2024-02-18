@extends('layout.front')

@section('content')
    <section>
        <div class="bg-white pt-2 pb-2">
            <div class="container">
                <div class="row justify-content-center search-input-main">
                    <div class="col-lg-5 col-md-8 col-12 text-center">
                        <form action="/search" method="get">
                            <input type="text" name="q" id="" placeholder="Cari Judul atau Author" class="form-control w-100 rounded-pill fs-sm px-md-4 px-3 text-gray">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if (!$dataContent)
            
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12 ">
                    <div class="row justify-content-center mx-md-0 mx-1">
                        @foreach ($genre->take(6) as $data)
                            <div class="col-auto mb-1 px-0 mx-3  text-center">
                                <a href="/genre?s={{$data->slug}}" class="search-genre-wrapper rounded-circle">
                                    <img src="{{ Storage::url($data->photo) }}" alt="">
                                </a>
                                <p class="fs-s-sm text-gray mb-0 mt-2">{{$data->name}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 mb-3">
                    <h4 class="front-title-header">Komik terkait</h4>
                </div>
            </div>
            <div class="row">
                
                @foreach ($content as $data)
                @php
                $likeCountAll = $data->chapters->sum(function ($chapter) {
                                    return $chapter->likes->count();
                                });
                @endphp
                    <div class="col-auto mb-3 pe-md-1 pe-0">
                        <a href="/komik/{{$data->slug}}/list" class="contentContainer">
                            <div class="card_front">
                                <img src="{{ Storage::url($data->thumbnail) }}" class="object-fit-cover"  alt="">
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
        @else
            <div class="container mt-5">
                <div class="row mt-5">
                    <div class="col-12 mb-3">
                        <h4 class="front-title-header">Komik <span class="fs-s-sm text-gray ms-3">(Hasil pencarian : {{$dataContent->count()}})</span></h4>
                    </div>
                </div>
                <div class="row">
                    
                    
                    @if ($dataContent->count() < 1)
                    
                    <div class="text-center">
                        <img src="{{asset('img/maskot/SearchNotFound.gif')}}" alt="" width="300px" >
                        <h6>WADUH, KITA TIDAK BISA MENEMUKAN KOMIK NYA NIH ! ...</h6>
                    </div>
                    @endif
                    @foreach ($dataContent as $data)
                    @php
                    $likeCountAll = $data->chapters->sum(function ($chapter) {
                                        return $chapter->likes->count();
                                    });
                    @endphp
                        <div class="col-auto mb-3 pe-md-1 pe-0">
                            <a href="/komik/{{$data->slug}}/list" class="contentContainer">
                                <div class="card_front">
                                    <img src="{{ Storage::url($data->thumbnail) }}" class="object-fit-cover"  alt="">
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
        @endif


    </section>
@endsection
