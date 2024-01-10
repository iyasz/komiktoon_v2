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
                <h4 class="front-title-header">Genre Lainnya</h4>
            </div>
        </div>
        <div class="row flex-nowrap overflow-auto">
            @foreach ($genre as $data)
                <div class="col-auto mb-1 pe-0">
                    <a href="" class="search-genre-wrapper" style="background-image: url({{Storage::url($data->photo)}})">
                        
                    </a>
                    <p>{{$data->name}}</p>
                </div>
            @endforeach
        </div>
    </div>
    
</section>

@endsection




