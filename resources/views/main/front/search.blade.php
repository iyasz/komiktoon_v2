@extends('layout.front')

@section('content')

<section>
    <div class="container mt-4">
        <div class="row justify-content-center search-input-main">
            <div class="col-lg-5 col-md-8 col-12 text-center">
                <form action="/search" method="get">
                    <input type="text" name="q" id="" placeholder="Cari Judul atau Kreator" class="form-control w-100 rounded-pill px-md-4 px-3 text-gray">
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
                    <a href="" class="search-genre-wrapper" style="background-image: url({{Storage::url($data->photo)}})"></a>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-12 mb-3">
                <h4 class="front-title-header">Komik terkait</h4>
            </div>
        </div>
        <div class="row">
            @for($i = 0; $i < 9; $i++ )
                <div class="col-auto mb-3 pe-1">
                    <a href="/{{$i}}" class="contentContainer">
                        <div class="pic">
                            <img src="{{Storage::url($data->photo)}}" class="object-fit-cover rounded-2" width="100%" height="210px">
                        </div>
                        <div class="badge badge-success my-2 fs-s-sm fw-500">
                            Manhwa
                        </div>
                        <div class="title-mid">
                            <h6 class="two-line-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, quo voluptatibus? Eaque?</h6>
                        </div>
                        <div class="">
                            <p class="fs-s-sm text-gray fw-300 mb-1">Release February 2024</p>
                            <h6 class="text-primary">Chapter 209</h6>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
    </div>
    
</section>

@endsection




