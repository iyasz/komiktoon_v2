@extends('layout.main')
@section('active-confirmation', 'text-primary')

@section('content')

<div id="app" class="mb-3">
    <div class="row">
        <div class="col-12 p-3">
            <div class="card border-0 rounded-1">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-9 pe-0">
                            <div class="d-flex align-items-center">
                                <a href="/panel/confirmation/content" class="btn btn-primary border-0 rounded-1"><i class="bi bi-chevron-left"></i></a>
                                <p class="mb-0 fs-5 ms-4 fw-500">Komik</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

        <div class="row">
            <div class="col-md-8 col-12 ps-3 pe-md-0 pe-3 order-md-0 order-1 mt-md-0 mt-3">

                <div class="card border-0 rounded-1">
                    <div class="card-body">
                        <hr>
                        <div class="mb-4">
                            <p class="text-gray mb-2 fw-500">Judul</p>
                            <p class="fs-sm text-gray">{{$content->title}}</p>
                            <hr>
                        </div>
                        <div class="mb-4">
                            <p class="text-gray mb-2 fw-500">Author</p>
                            <p class="fs-sm text-gray">{{$content->author}}</p>
                            <hr>
                        </div>
                        <div class="mb-4">
                            <p class="text-gray mb-2 fw-500">Sinopsis</p>
                            <p class="fs-sm text-gray">{!! nl2br(e($content->synopsis)) !!}</p>
                            <hr>
                        </div>
                        <div class="mb-4">
                            <p class="text-gray mb-2 fw-500">Tanggal</p>
                            <p class="fs-sm text-gray">{{$content->created_at->format('d M Y')}}</p>
                            <hr>
                        </div>
                    </div>
                </div>

                <div class="card border-0 rounded-1 mt-3">
                    <div class="card-body">
                        <h4>Chapter</h4>
                        <hr>
                        @foreach ($content->chapters as $data)
                        <a href="" data-bs-toggle="modal" data-bs-target="#modalReviewChapter" class="d-flex align-items-center text-decoration-none">
                            <img src="{{Storage::url($data->thumbnail)}}" alt="photo" width="80px" height="80px" class="object-fit-cover">
                            <div class="ms-3">
                                <p class="text-gray mb-1 fw-500">{{$data->title}}</p>
                                <p class="fs-s-sm text-gray">{{$data->created_at->format('d M Y')}}</p>
                            </div>
                        </a>
                        <hr>

                        @php
                            $decodeDataImage = json_decode($data->images, true)
                        @endphp

                        <div class="modal fade" id="modalReviewChapter" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="content">
                                        @foreach ($decodeDataImage as $item)
                                            <img src="{{Storage::url($item['photo'])}}" alt="" width="100%">
                                        @endforeach
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="col-md-4 col-12 ps-3 pe-3 order-md-1 order-0 ">
                <div class="card border-0 rounded-1">
                    <div class="card-body">
                        <div class="position-relative">
                            <div class="">
                                <p class="fw-500 mb-2 text-gray">Thumbnail </p>
                                <div class="square_thumbnail_show">
                                    <img src="{{Storage::url($content->thumbnail)}}" alt="banner" class="imagePreview rounded-2">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
</div>


@endsection


