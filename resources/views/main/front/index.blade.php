@extends('layout.front')

@section('content')
    <section id="hero-content-section" style="background-image: url('{{ asset('img/bg.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    {{-- <h>keren</h>   --}}
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container mt-5">
            <div class="row">
                @foreach($content as $data)
                    <div class="col-auto mb-3 pe-md-1 pe-0">
                        <a href="/komik/{{$data->slug}}/list" class="contentContainer">
                            <div class="card_front">
                                <img src="{{ Storage::url($data->thumbnail) }}" class=""  alt="">
                                <div class="info">
                                    <p class="subj">{{$data->title}}</p>
                                    <div class="grade-area">
                                        <i class="bi bi-heart-fill text-primary"></i>
                                        <p class="mb-0 ms-2">{{ number_format($data->chapters->count()) }}</p>
                                    </div>
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
    </section>
@endsection
