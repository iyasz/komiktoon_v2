@extends('layout.main')
@section('active-other', 'text-primary')
@section('active-banner-show', 'show')
@section('active-content-banner', 'text-primary')

@section('content')
    <div id="app">
        <div class="row">
            <div class="col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-md-4 col-9 pe-0">
                                <div class="input-group">
                                    <span class="input-group-text bg-primary d-md-flex d-none px-3"><i class="bi bi-search text-white"></i></span>
                                    <input type="text" id="searchTableData" class="form-control fs-sm text-gray" placeholder="Cari disini .." >
                                </div>
                            </div>
                            <div class="col-md-2 col-3">
                                <a href="/panel/background/auth/create" class="btn btn-primary border-0 rounded-1 h-100 w-100 fs-sm d-flex align-items-center justify-content-center"><i class="bi bi-plus-lg me-md-2 me-0"></i> <span class="d-md-block d-none">Tambah</span></a>
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
                                <th>Banner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">

                            @foreach ($banners as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{Storage::url($data->photo)}}" alt="photo" width="180px"  class="object-fit-cover"></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <form action="/panel/background/auth/{{$data->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Apakah anda ingin menghapus cateogry ini?')" class="btn btn-primary border-0 rounded-1 fs-s-sm mx-1"><i class="bi bi-trash3"></i></button>
                                        </form>
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

