@extends('layout.contribute')
@section('content-active', 'text-primary')

@section('content')
    <div id="app">
        {{-- <div class="wrapper-banner-content" style="background-image: url('{{ asset('img/bg-detail.png') }}');">
            <div class="detail_content position-relative">
                <div class="thumb">
                    <img src="{{ asset('img/people.png') }}" alt="" class="d-lg-block d-none" width="100%" height="250">
                </div>
                <div class="info text-center">
                    <p class="genre mb-0">
                        {{ $content->genreDetail->pluck('genre.name')->implode(', ') }}
                    </p>
                    <h1 class="title text-white">{{ $content->title }}</h1>
                    <p class="creator mb-0 text-white">{{ $content->author }} <a data-bs-toggle="modal" data-bs-target="#modalInfo" class="text-white ms-1 d-md-inline d-none"><svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"> <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" /> </svg></a></p>
                </div>
            </div>
        </div> --}}
        <div class="row">

            <div class="col-lg-12 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body wrapper-confirm">
                        <div class="header-input-bg-banner" style="background-image: url({{asset('img/awdawd.png')}})">
                            <div class="banner-preview">

                            </div>
                            <div class="char-preview">
                                <img src="{{asset('img/awd.png')}}" width="100%" height="220" alt="">
                            </div>
                        </div>
                        <div class="container">
                            <div class="body_confirm_detail">
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal" id="alertModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-0">
            <div class="modal-body py-5">
              <div class="text-center">
                <p class="text-gray"></p>
              </div>
              <div class="d-flex justify-content-center mt-4 mx-3">
                  <button class="btn bg-dark text-white py-3 px-5 border-0 rounded-pill" data-bs-dismiss="modal">YA</button>
                </div>
            </div>
          </div>
        </div>
      </div>

@endsection

