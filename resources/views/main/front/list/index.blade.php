@extends('layout.front')

@push('css')
    <style>
        body {
            background-color: rgb(240, 240, 240) !important;
        }

        .nav-pills .nav-link.active {
            background-color: transparent;
            color: #818181;
        }

        .nav-pills .nav-link {
            color: #c6c6c6;
        }

        .col-8 {
            width: 70.00000000% !important;
        }

        .col-4 {
            width: 30.00000000% !important;
        }
    </style>
@endpush

@section('content')
    <div id="app">
        <div class="wrapper-banner-content" style="background-image: url('{{ asset('img/detail_bg.png') }}');">
            <div class="detail_content position-relative">
                <div class="thumb">
                    <img src="{{ asset('img/banertes.png') }}" alt="" width="100%">
                </div>
                <div class="info text-center">
                    <p class="genre mb-0">
                        {{ $content->genreDetail->pluck('genre.name')->implode(', ') }}
                    </p>
                    <h1 class="title text-white">Night of the Goblin</h1>
                    <p class="creator mb-0 text-white">Hdr robot <a href="" class="text-white ms-1"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                            </svg></a></p>
                </div>
            </div>
        </div>
        <div class="container px-0 detail_list_content">
            <div class="content">
                <div class="container mx-0">
                    <div class="row">
                        <div class="col-8 px-0 left-content-list">
                            <div class="line"></div>
                            <div class="list">
                                <div class="ms-3 mt-2 d-flex align-items-center">

                                    <ul class="nav nav-pills mt-3 mb-2" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link p-0 active" id="pills-home-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-home" type="button" role="tab"
                                                aria-controls="pills-home" aria-selected="true">Chapter List</button>
                                        </li>
                                        <li class="mx-3 text-gray">/</li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link p-0" id="pills-profile-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-profile" type="button" role="tab"
                                                aria-controls="pills-profile" aria-selected="false">Komentar <span
                                                    class="ms-2 fs-s-sm">({{ number_format(12939) }})</span></button>
                                        </li>
                                    </ul>

                                    <div class="favorit me-3 ms-auto mt-1">
                                        <button class="btn bg-none rounded-pill border fs-sm px-4 py-2">
                                            <img src="{{ asset('img/maskot/wishlist.svg') }}" width="20px" height="20px"
                                                class="me-1" alt="">
                                            Favorit</button>
                                    </div>

                                    {{-- <div class="text-center">
                                            <p class="m-0 fs-sm fw-500">Setelah baca langsung like yuk!</p>
                                            <p class="mb-0 fs-sm ">Setelah membaca <span class="text-primary">Komik</span>
                                                ini,
                                                hargai dengan like dan dukungan dikomentar!</p>
                                        </div> --}}

                                    {{-- <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">...</div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                                            <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
                                          </div> --}}

                                </div>
                                <div class="list-content">
                                    <ul class="px-3">
                                        <hr class="mb-0">
                                        @foreach ($content->chapters->sortByDesc('created_at') as $data)
                                            <a class="text-dark" href="/{{ $content->slug }}/{{ $data->slug }}/view">
                                                <li class="d-flex align-items-center">
                                                    <img src="{{ Storage::url($data->thumbnail) }}" alt=""
                                                        width="85px" height="85px">
                                                    <p class="mb-0 d-inline ms-3 text-gray">{{ $data->title }}</p>
                                                    <div class="ms-auto me-5">
                                                        <p class="mb-0 opacity-50 fs-s-sm">
                                                            {{ $data->created_at->format('d M y') }}</p>
                                                    </div>
                                                    <p class="mb-0 me-2">#{{ $loop->count - $loop->iteration + 1 }}</p>
                                                </li>
                                            </a>
                                            <hr class="my-0">
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="col-4 px-0 right-content-list">
                            <div class="p-4">
                                <ul class="d-flex ps-0">
                                    <li class="view fs-sm">
                                        <i class="bi bi-eye-fill text-primary"></i> <span
                                            class="fw-300 ms-1">{{ number_format(2030) }}</span>
                                    </li>
                                    <li class="view fs-sm ms-4">
                                        <i class="bi bi-heart-fill text-primary"></i> <span
                                            class="fw-300 ms-1">{{ number_format(2030) }}</span>
                                    </li>
                                    <li class="rate ms-4 fs-sm">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-star-fill text-primary"></i> <span
                                                class="fw-300 ms-1">9,5</span>
                                        </div>
                                    </li>
                                    <button class="btn p-0 border-0 fs-sm ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                        </svg>
                                    </button>
                                </ul>
                                <div class="update mt-3 d-flex align-items-center">
                                    <img src="{{ asset('img/maskot/upd_content.png') }}" width="40px" height="40px"
                                        alt="">
                                    <p class="mb-0 fw-500 ms-2">Update KAMIS</p>
                                </div>
                                <div class="desc mt-4">
                                    <p class="mb-0 fs-sm opacity-75">{{ $content->synopsis }}</p>
                                </div>
                                <div class="action mt-5">
                                    <a href=""
                                        class="btn btn-dark fs-sm w-100 rounded-pill border-0 py-3 d-flex justify-content-between align-items-center">
                                        <span class="mx-auto">Ch. Pertama</span>
                                        <span><i class="bi bi-chevron-right "></i></span>
                                    </a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
