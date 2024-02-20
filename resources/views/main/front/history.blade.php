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
                <ul class="nav nav-pills top mb-3 mx-lg-4 mx-auto justify-content-center flex-nowrap overflow-auto" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="/favorit" class="nav-link border-bottom-white rounded-0 bg-transparent py-3 me-3 text-gray fw-400 " >Favorit</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="/history" class="nav-link border-bottom-white rounded-0 bg-transparent py-3 me-3 text-gray fw-400 active" >History</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="row">
                        @php
                            $prevDate = null;
                        @endphp
                @if($history->count() > 0)
                    @foreach ($history as $data)
                        @php
                            $currentDate = $data->created_at->format('d M Y');
                        @endphp
                    
                        @if ($prevDate !== $currentDate)
                            <h5 class="mt-4 mb-3 ">{{ $currentDate }}</h5>
                            @php
                                $prevDate = $currentDate;
                            @endphp
                        @endif

                        @php  
                            $likeCountAll = $data->content->chapters->sum(function ($chapter) {
                                return $chapter->likes->count();
                            });
                        @endphp

                        {{-- <h4 class="mb-3">{{$data->created_at->format('d M Y')}}</h4> --}}
                        <div class="col-auto mb-3 pe-md-1 pe-0 ">
                            <a href="/komik/{{$data->content->slug}}/list" class="contentContainer">
                                <div class="card_front">
                                    <img src="{{ Storage::url($data->content->thumbnail) }}" class=""  alt="">
                                    <div class="info">
                                        <p class="subj">{{$data->content->title}}</p>
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
                        <h3 class="mb-1 fw-500">Waduh History Kamu Kosong!</h4>
                        <a class="text-decoration-none text-primary" href="/">Yuk cari Komik untuk dibaca!</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
</section>
@endsection
