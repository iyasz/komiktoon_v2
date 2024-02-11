@extends('layout.main')
    
@section('content')

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
                                <th>Alasan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">

                            @foreach ($content as $data)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{Storage::url($data->thumbnail)}}" alt="photo" width="80px" height="80px" class="object-fit-cover"></td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->takedown[0]['reason']}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="/panel/komik/{{$data->slug}}/detail" class="btn btn-primary border-0 rounded-1 fs-s-sm"><i class="bi bi-eye"></i></a>
                                        <form action="/panel/takedown/content/{{$data->slug}}/recovery" method="POST">
                                            @csrf
                                            @method('put')
                                            <button onclick="return confirm('Apakah karya ini ingin dipulihkan ?')" class="btn btn-primary border-0 rounded-1 fs-s-sm mx-1"><i class="bi bi-check-lg"></i></button>
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


