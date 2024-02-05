@extends('layout.front')

@section('content')
    <section>
        <div class="container mt-4">
            <div class="row justify-content-center search-input-main">
                <div class="col-lg-5 col-md-8 col-12 text-center">
                    <form action="/search" method="get">
                        <input type="text" name="q" id="" placeholder="Cari Judul atau Kreator"
                            class="form-control w-100 rounded-pill px-md-4 px-3 text-gray">
                    </form>
                    <hr class="mx-5">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 mb-3">
                    <h4 class="front-title-header">Genre </h4>
                </div>
            </div>
            <div class="row flex-nowrap overflow-auto mx-md-0 mx-1">
                @foreach ($genre as $data)
                    <div class="col-auto mb-1 px-0 me-2">
                        <a href="" class="search-genre-wrapper"
                            style="background-image: url({{ Storage::url($data->photo) }})"></a>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-12 mb-3">
                    <h4 class="front-title-header">Komik terkait</h4>
                </div>
            </div>
            <div class="row">
                @for ($i = 0; $i < 9; $i++)
                    <div class="col-auto mb-3 pe-1">
                        <a href="/{{ $i }}" class="contentContainer">
                            <div class="card_front">
                                <img src="{{ asset('img/30.jpg') }}" class="object-fit-cover" width="210" height="210"
                                    alt="">
                                <div class="info">
                                    <p class="subj">The dragon's king bride</p>
                                    <div class="grade-area">
                                        <i class="bi bi-heart-fill text-primary"></i>
                                        <p class="mb-0 ms-2">{{ number_format(2030) }}</p>
                                    </div>
                                </div>
                                <p class="content_genre">Romantis</p>
                            </div>
                            <div class="card_back">
                                <div class="info">
                                    <p class="subj">The dragon's king bride</p>
                                    <div class="creator-name">
                                        <p>HDR ROBOT</p>
                                    </div>
                                    <p class="line-content"></p>
                                    <div class="content-desc">
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ex explicabo
                                            doloribus nihil pariatur similique nobis expedita est aliquid qui. Minima,
                                            officiis nulla deleniti itaque deserunt doloribus harum cupiditate debitis!</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endfor
            </div>
        </div>

    </section>
@endsection
