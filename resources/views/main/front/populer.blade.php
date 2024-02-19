@extends('layout.front')

@section('content')
    <section id="app-wrapper">
        <div class="">
            <div class="bg-white">
                <div class="container">
                    <ul class="nav nav-pills top border-bottom mb-3 mx-lg-4 mx-auto justify-content-center flex-nowrap overflow-auto" id="pills-tab" role="tablist">
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

                    {{-- <div class="col-auto mb-3 pe-md-1 pe-0">
                        <a href="/komik/{{$contentMostPopuler->slug}}/list" class="contentContainer populer">
                            <div class="card_front">
                                <img src="{{ Storage::url($contentMostPopuler->thumbnail) }}" class="object-fit-cover"  alt="">
                                <div class="info">
                                    <p class="subj">{{$contentMostPopuler->title}}</p>
                                    <div class="grade-area">
                                        <i class="bi bi-heart-fill text-primary"></i>
                                        <p class="mb-0 ms-2">{{ number_format($likeCountAll) }}</p>
                                    </div>
                                </div>
                                <p class="content_genre">{{ $contentMostPopuler->genreDetail->first()->genre->name }}</p>
                            </div>
                            <div class="card_back">
                                <div class="info">
                                    <p class="subj">{{$contentMostPopuler->title}}</p>
                                    <div class="creator-name">
                                        <p>{{$contentMostPopuler->author}}</p>
                                    </div>
                                    <p class="line-content"></p>
                                    <div class="content-desc">
                                        <p>{{$contentMostPopuler->synopsis}}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                    
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
                                        @if ($item->created_at >  \Carbon\Carbon::now()->subWeek())
                                        <div class="badge-icon">
                                            <img src="{{asset('img/template/new_st.png')}}" alt="status" width="30">
                                        </div>
                                        @elseif($item->chapters()->whereDate('created_at', '>', now()->subDays(3))->exists())
                                        <div class="badge-icon">
                                            <img src="{{asset('img/template/up_st.png')}}" alt="status" width="30">
                                        </div>
                                        @elseif($item->is_ongoing == 2)
                                        <div class="badge-icon">
                                            <img src="{{asset('img/template/end_st.png')}}" alt="status" width="30">
                                        </div>
                                        @endif
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

        
    </section>
@endsection
