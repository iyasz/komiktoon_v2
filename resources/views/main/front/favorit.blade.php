@extends('layout.front')

@push('css')
    <style>
        #app-wrapper {
            min-height: 540px
        }
    </style>
@endpush

@section('content')
<section id="app-wrapper">
    <div class="">
        <div class="bg-white">
            <div class="container">
                <ul class="nav nav-pills top border-bottom mb-3 mx-lg-4 mx-auto flex-nowrap overflow-auto" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="/favorit" class="nav-link border-bottom-white rounded-0 bg-transparent py-3 me-3 text-gray fw-400 active" >Favorit</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="/history" class="nav-link border-bottom-white rounded-0 bg-transparent py-3 me-3 text-gray fw-400" >History</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">

                <div class="row">
                    @if($favorit->count() > 0)
                    @foreach ($favorit as $data)
                        @php
                        $likeCountAll = $data->content->chapters->sum(function ($chapter) {
                                                    return $chapter->likes->count();
                                                });
                        @endphp
                        <div class="col-auto mb-3 pe-md-1 pe-0">
                            <a href="/komik/{{$data->content->slug}}/list" class="contentContainer">
                                <div class="card_front">
                                    <img src="{{ Storage::url($data->content->thumbnail) }}" class=""  alt="">
                                    <div class="info">
                                        <p class="subj">{{$data->content->title}}</p>
                                        <div class="grade-area">
                                            <i class="bi bi-heart-fill text-primary"></i>
                                            <p class="mb-0 ms-2">{{ number_format($likeCountAll) }}</p>
                                        </div>
                                    </div>
                                    <p class="content_genre">{{ $data->content->genreDetail->first()->genre->name }}</p>
                                </div>
                                    <div class="card_back">
                                        <div class="info">
                                            <p class="subj">{{$data->content->title}}</p>
                                            <div class="creator-name">
                                                <p>{{$data->content->author}}</p>
                                            </div>
                                            <p class="line-content"></p>
                                            <div class="content-desc">
                                                <p>{{$data->content->synopsis}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                    <div class="text-center mt-5">
                        <h3 class="mb-1 fw-500">Waduh Favorit Kamu Kosong!</h4>
                        <a class="text-decoration-none text-primary" href="/">Yuk cari Komik yang kamu mau!</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
</section>
@endsection
