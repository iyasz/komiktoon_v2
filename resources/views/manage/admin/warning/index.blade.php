@extends('layout.main')
@section('active-warning', 'text-primary')
    
@section('content')

<div class="modal fade" id="reportModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body p-5">
                <div class="text-center mb-4">
                    <p class="">Pilih alasan anda memblokir komik <br> <span class="text-primary text-title-rejected" data-slug=""></span></p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="text" name="" id="" class="form-control valueReasonBlock">
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4 mx-3 mt-5">
                    <button class="btn bg-dark disabled text-white py-3 px-5 border-0 rounded-pill" id="btnConfirmReport" data-bs-dismiss="modal">Submit</button>
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
                                <th>Judul</th>
                                <th>Alasan</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">

                            @foreach ($warning as $data)
                            @php
                                $reason = [
                                    1 => 'Konten tidak sesuai',
                                    2 => 'Penyebaran kebencian',
                                    3 => 'Pelanggaran hak cipta',
                                    4 => 'Mengandung konten seksual',
                                    5 => 'Pelanggaran privasi',
                                    6 => 'Konten bersifat rasisme',
                                ];
                            @endphp
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$data->content->title}}</td>
                                <td>{{$reason[$data->reason]}}</td>
                                <td>{{$data->created_at->format('d M Y')}}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="/panel/komik/{{$data->content->slug}}/detail" class="btn btn-primary border-0 rounded-1 fs-s-sm"><i class="bi bi-eye"></i></a>
                                        <button data-slug="{{$data->content->slug}}" data-title="{{$data->content->title}}" class="btn btn-primary ms-1 btn-show-rejected border-0 rounded-1 fs-s-sm"><i class="bi bi-x-lg"></i></button>
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

            
            $('.valueReasonBlock').on('input', function() {
                if ($(this).val().trim() !== '') {
                    if ($('#btnConfirmReport').hasClass('disabled')) {  
                        $('#btnConfirmReport').removeClass('disabled');
                    }
                }else{
                    $('#btnConfirmReport').addClass('disabled');
                }
            });

            
            $('.btn-show-rejected').click(function(){
                $('.text-title-rejected').text($(this).data('title'))
                $('.text-title-rejected').attr('data-slug', $(this).data('slug'))

                $('#reportModal').modal('show')
            })

            $('#btnConfirmReport').click(function(){
                var slug = $('.text-title-rejected').data('slug')
                var value = $('.valueReasonBlock').val();

                axios.put('/panel/komik/'+slug+'/block', {value: value}).then(function(response) {
                    window.location.reload()
                }).catch(function(error) {  
                    console.error(error);
                });

            })
        });

    </script>
@endpush


