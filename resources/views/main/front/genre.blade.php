@extends('layout.front')

@section('content')
    <section id="app-wrapper">
        <div class="">
            <div class="bg-white">
                <div class="container">
                    <ul class="nav nav-pills top border-bottom mb-3 mx-lg-4 mx-auto justify-content-center flex-nowrap overflow-auto" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="/populer" class="nav-link border-bottom-white rounded-0 bg-transparent py-3 me-3 text-gray fw-400" >Populer</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="/genre" class="nav-link border-bottom-white rounded-0 bg-transparent py-3 me-3 text-gray fw-400 active" >Genre</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="row justify-content-center mx-md-0 mx-1">
                    @foreach ($genre as $data)
                    <div class="col-auto mb-1 px-0 mx-lg-3 mx-2 mb-2 text-center">
                            <a href="/genre?s={{$data->slug}}" class="icon-genre-wrapper {{request()->get('s') == $data->slug ? 'active' : ''}} rounded-circle">
                                <img src="{{ Storage::url($data->photo) }}" alt="">
                            </a>
                    </div>
                    @endforeach
                    </div>
            </div>
        </div>

        @if ($result && isset($result->name))
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h4 class="front-title-header">Komik <span class="fs-s-sm text-gray ms-2">({{$result->name}})</span></h4>
                    </div>
                </div>
                <div class="row">
            @foreach ($result->genreDetail as $item)
                        @if ($item->contents->status == 3)
                        @php
                        $likeCountAll = $item->contents->chapters->sum(function ($chapter) {
                                return $chapter->likes->count();
                            });
                        @endphp
                            <div class="col-auto mb-3 pe-md-1 pe-0">
                                <a href="/komik/{{$item->contents->slug}}/list" class="contentContainer">
                                    <div class="card_front">
                                        <img src="{{ Storage::url($item->contents->thumbnail) }}" class="object-fit-cover"  alt="">
                                        <div class="info">
                                            <p class="subj">{{$item->contents->title}}</p>
                                            <div class="grade-area">
                                                <i class="bi bi-heart-fill text-primary"></i>
                                                <p class="mb-0 ms-2">{{ number_format($likeCountAll) }}</p>
                                            </div>
                                        </div>
                                        <p class="content_genre">{{ $item->contents->genreDetail->first()->genre->name }}</p>
                                    </div>
                                    <div class="card_back">
                                        <div class="info">
                                            <p class="subj">{{$item->contents->title}}</p>
                                            <div class="creator-name">
                                                <p>{{$item->contents->author}}</p>
                                            </div>
                                            <p class="line-content"></p>
                                            <div class="content-desc">
                                                <p>{{$item->contents->synopsis}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        @endforeach
                    </div>
                </div>
        @else
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 mb-3">
                    <h4 class="front-title-header">Komik Terkait</h4>
                </div>
            </div>
            <div class="row">
                @foreach ($content as $item)
                @php
                $likeCountAll = $item->chapters->sum(function ($chapter) {
                        return $chapter->likes->count();
                    });
                @endphp
                    <div class="col-auto mb-3 pe-md-1 pe-0">
                        <a href="/komik/{{$item->slug}}/list" class="contentContainer">
                            <div class="card_front">
                                <img src="{{ Storage::url($item->thumbnail) }}" class="object-fit-cover"  alt="">
                                <div class="info">
                                    <p class="subj">{{$item->title}}</p>
                                    <div class="grade-area">
                                        <i class="bi bi-heart-fill text-primary"></i>
                                        <p class="mb-0 ms-2">{{ number_format($likeCountAll) }}</p>
                                    </div>
                                </div>
                                <p class="content_genre">{{ $item->genreDetail->first()->genre->name }}</p>
                            </div>
                            <div class="card_back">
                                <div class="info">
                                    <p class="subj">{{$item->title}}</p>
                                    <div class="creator-name">
                                        <p>{{$item->author}}</p>
                                    </div>
                                    <p class="line-content"></p>
                                    <div class="content-desc">
                                        <p>{{$item->synopsis}}</p>
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
