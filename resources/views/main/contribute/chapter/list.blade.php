@extends('layout.contribute')
@section('content-active', 'text-primary')

@section('content')
    <div id="app">
        <div class="row">

            <div class="col-lg-12 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        
                        <hr class="mx-2">
                        <div class="d-flex flex-nowrap overflow-auto header_content_view">

                            <div class=""> 
                                <img src="{{Storage::urL($content->thumbnail)}}" width="190px" height="190px" alt="">
                            </div>
                            <div class="ms-4">
                                <p class="fs-sm text-primary mb-0">{{ $content->genreDetail->pluck('genre.name')->implode(', ') }}</p>
                                <h4>{{$content->title}} </h4>
                                <p class="fs-sm text-gray mb-2 two-line-text">{{$content->synopsis}}</p>
                                <a href="/contribute/content/{{$content->slug}}/edit" class="btn bg-semi-gray text-gray border-0 me-2 rounded-0 py-2 mt-2 fs-s-sm">Edit Komik</a>
                                @if ($content->status == 3)
                                    <a href="/contribute/content/{{$content->slug}}/banner/edit" class="btn bg-semi-gray text-gray border-0 me-2 rounded-0 py-2 mt-2 fs-s-sm">Edit Banner</a>
                                @endif
                            </div>
                        </div>
                        <hr class="mx-2 mb-2">
                        <div class="">
                            <div class="row">
                                <div class="col-md-10 col-9 pe-0">
                                    <input type="text" placeholder="Cari Chapter disini .." id="searchChapterData" class="form-control text-gray fs-sm">
                                </div>
                                <div class="col-md-2 col-3">
                                    <a href="/contribute/chapter/create/{{$content->slug}}" class="btn btn-primary border-0 rounded-1 w-100 h-100 d-flex align-items-center justify-content-center" ><i class="bi bi-plus-lg"></i> <span class="d-md-inline d-none ms-2">Tambah</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="list-content">
                            <div class="table-responsive">
                                <table class="table">
                                    @if ($content->chapters->count() > 0)
                                    @php
                                        $initialNumber = $content->chapters->count();
                                    @endphp
                                        @foreach ($content->chapters()->orderBy('created_at', 'desc')->get() as $data)
                                        <tr>
                                            <td>
                                                <li class="align-items-center chapter-section" style="display: flex;">
                                                    <img src="{{ Storage::url($data->thumbnail) }}" alt="" width="85px" height="85px" class="object-fit-cover">
                                                    @php
                                                        $parts = explode(" - ", $data->title);
                                                        $chapterDetailNumber = $parts[0];
                                                    @endphp
                                                    <p class="mb-0 d-inline ms-3 text-gray title-chapter-limit "><span class="d-lg-block d-none">{{ $data->title }}</span><span class="d-lg-none d-block">{{$chapterDetailNumber}}</span> </p>
                                                    <div class="ms-auto me-md-5 me-4 d-flex align-items-center">
                                                        <p class="mb-0 opacity-50 fs-s-sm me-lg-5 me-2 d-md-block d-none">{{ $data->created_at->format('d M y') }}</p>
                                                        
                                                        <button data-slug="{{$data->slug}}" class="mb-0 btn_switch_status fs-4 p-0 border-0 bg-transparent opacity-50 text-decoration-none text-dark">
                                                            @if($data->is_active == 1)
                                                                <span><i class="bi bi-toggle-off"></i></span>
                                                            @else
                                                                <span><i class="bi bi-toggle-on text-primary"></i></span>
                                                            @endif
                                                        </button>
                                                        
                                                        <a href="/contribute/chapter/{{$content->slug}}/{{$data->slug}}/edit" class="mb-0 opacity-50 ms-3 text-decoration-none text-dark"><i class="bi bi-pencil"></i></a>
                                                    </div>
                                                    <p class="mb-0 me-2">#{{ $initialNumber  }}</p>
                                                </li>
                                                @php
                                                    $initialNumber--;
                                                @endphp
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                            <div class="text-center">
                                                <img src="{{asset('img/maskot/SearchNotFound.gif')}}" alt="" width="200px" >
                                                <h6 class="fs-sm mb-1">WADUH, BELUM ADA CHAPTER DISINI NIH ! ... BUAT YUK !</h6>
                                                <a href="/contribute/chapter/create/{{$content->slug}}" class="mb-0 text-decoration-none fs-sm text-primary">Lanjut bikin chapter baru </a>
                                            </div>
                                        @endif
                                </table>
                            </div>
                            <ul class="px-3">
                               
                            </ul>    
                            
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="modal" id="alertModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-body p-5">
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

@push('javascript')
    <script>

        $(document).ready(function(){
            $("#searchChapterData").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".list-content .table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
            
            $(".btn_switch_status").on("click", function() {
                var $button = $(this);
     
                axios.put(window.location.href, {slug : $(this).attr('data-slug')})
                .then(function (response) {
                    console.log(response);
                    if (response.data.message == 1) {
                        $button.closest('.ms-auto').find('.btn_switch_status').html('<i class="bi bi-toggle-off"></i>');
                    } else if(response.data.message == 2) {
                        $button.closest('.ms-auto').find('.btn_switch_status').html('<i class="bi bi-toggle-on text-primary"></i>');
                    }else if(response.data.message == 3){
                        $('#alertModal').modal('show')
                        $('#alertModal .modal-content p').html("Tidak bisa melakukan aksi ini!")
                    }
                });  
            });


        });

            

    </script>
@endpush



