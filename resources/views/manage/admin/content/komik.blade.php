@extends('layout.main')
    
@section('content')
<div class="modal fade" id="reportModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body p-5">
                <div class="text-center mb-4">
                    <p class="">Pilih alasan anda menolak komik <br> <span class="text-primary text-title-rejected" data-slug=""></span></p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="text" name="" id="" class="form-control valueReasonRejected">
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4 mx-3 mt-5">
                    <button class="btn bg-dark disabled text-white py-3 px-5 border-0 rounded-pill" id="btnConfirmReport" data-bs-dismiss="modal">Tolak</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="app">
        <div class="row">
            <div class="col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-4 col-12">
                                <div class="input-group">
                                    <span class="input-group-text bg-primary px-3"><i class="bi bi-search text-white"></i></span>
                                    <input type="text" id="searchTableData" class="form-control fs-sm text-gray" placeholder="Cari disini .." >
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

            
        <div class="row">
            <div class="col-12 px-3">
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Thumbnail</th>
                                <th>Judul</th>
                                <th>Author</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">

                            @foreach ($content as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{Storage::url($data->thumbnail)}}" alt="photo" width="80px" height="80px" class="object-fit-cover"></td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->author}}</td>
                                <td>{{$data->created_at->format('d M Y')}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="/panel/confirmation/content/{{$data->slug}}/detail" class="btn btn-primary border-0 rounded-1 fs-s-sm"><i class="bi bi-eye"></i></a>
                                        <form action="/panel/confirmation/content/{{$data->slug}}" method="POST">
                                            @csrf
                                            @method('post')
                                            <button onclick="return confirm('Apakah karya ini disetujui ?')" class="btn btn-primary border-0 rounded-1 fs-s-sm mx-1"><i class="bi bi-check-lg"></i></button>
                                        </form>
                                        <button data-slug="{{$data->slug}}" data-title="{{$data->title}}" class="btn btn-primary btn-show-rejected border-0 rounded-1 fs-s-sm"><i class="bi bi-x-lg"></i></button>
                                    </div> 
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
          
    </div>
@endsection

@push('javascript')
    <script>
        
        $(document).ready(function(){
            $("#searchTableData").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#tableData tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
@endpush


