@extends('layout.contribute')
@section('dashboard-active', 'text-primary')

@push('css')
    <style>
        .table {
            border-collapse: separate;
            border-spacing: 0 7px;
        }

        .table th {
            text-align: center;
            background-color: transparent;
        }
        
        td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    <div id="app" class="mb-3">
        <div class="row flex-nowrap overflow-auto">

            <div class="col-lg-4 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <p class="mb-0 fs-sm">Likes</p>
                            </div>
                            <div class="col-5">
                                <select id="likesCount" class="form-control form-control-sm fs-s-sm p-2">
                                    <option selected>All</option>
                                    <option value="7">7 Days</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="icon-dashboard-panel" style="background: #f3ecfd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ac7af3" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                  </svg>
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600" id="d_likesCount">{{number_format($totalLikes)}}</p>
                                <p class="fs-s-sm">Jumlah Seluruh Like</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 py-3 px-0">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <p class="mb-0 fs-sm">Views</p>
                            </div>
                            <div class="col-5">
                                <select id="viewsCount" class="form-control form-control-sm fs-s-sm p-2">
                                    <option selected>All</option>
                                    <option value="7">7 Days</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="icon-dashboard-panel" style="background: #fdecee">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#f37a88" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600" id="d_viewsCount">{{number_format($totalViews)}}</p>
                                <p class="fs-s-sm">Jumlah Pembaca</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <p class="mb-0 fs-sm">Comments</p>
                            </div>
                            <div class="col-5">
                                <select id="commentsCount" class="form-control form-control-sm fs-s-sm p-2">
                                    <option selected>All</option>
                                    <option value="7">7 Days</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="icon-dashboard-panel" style="background: #ecfafd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#75dcf4" class="bi bi-chat-square-dots-fill" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                </svg>  
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600" id="d_commentsCount">{{number_format($totalComments)}}</p>
                                <p class="fs-s-sm">Jumlah Total Komentar</p>    
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row my-4 my-lg-auto">
            <div class="col-12 px-3 ">
                <div class="card border-0 rounded-1">
                    <div class="card-body">
                        <h5 class="fw-600 ">Most Viewed</h5>
                        <hr>

                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Thumbnail</th>
                                            <th>Judul</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableData">
            
                                        @foreach ($totalContentsWithMostViews as $data)
                                        <tr class="shadow-sm">
                                            <td>{{$loop->iteration}}</td>
                                            <td><img src="{{Storage::url($data->thumbnail)}}" alt="photo" width="80px" height="80px" class="object-fit-cover"></td>
                                            <td>{{$data->title}}</td>
                                            <td>{{$data->is_ongoing == 1 ? 'Berlangsung' : 'Tamat'}}</td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('javascript')

    <script>
        
        $('#likesCount').on('change', function(){
            let data = new FormData();
            data.append('likesCount', $('#likesCount').val());
            
            axios.post(window.location.href, data).then(function (response) {
                $('#d_likesCount').text(response.data.likeDataCount)
            });

        })

        $('#viewsCount').on('change', function(){
            let data = new FormData();
            data.append('viewData', $('#viewsCount').val());
            
            axios.post(window.location.href, data).then(function (response) {
                $('#d_viewsCount').text(response.data.viewsDataCount)
            });

        })

        $('#commentsCount').on('change', function(){
            let data = new FormData();
            data.append('commentData', $('#commentsCount').val());
            
            axios.post(window.location.href, data).then(function (response) {
                $('#d_commentsCount').text(response.data.commentDataCount)
            });
        })

    </script>


@endpush


