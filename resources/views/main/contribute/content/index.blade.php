@extends('layout.contribute')

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
                                <select name="" id="" class="form-control form-control-sm fs-s-sm p-2">
                                    <option value="" selected>30 Days</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="icon-dashboard-panel" style="background: #f3ecfd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ac7af3" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                </svg>    
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600">{{number_format(2400)}}</p>
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
                                <p class="mb-0 fs-sm">Peringatan</p>
                            </div>
                            <div class="col-5">
                                <select name="" id="" class="form-control form-control-sm fs-s-sm p-2">
                                    <option value="" selected>30 Days</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="icon-dashboard-panel" style="background: #fdecee">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#f37a88" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                </svg>    
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600">{{number_format(2400)}}</p>
                                <p class="fs-s-sm">Jumlah Buku Dibuat</p>
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
                                <p class="mb-0 fs-sm">Penghasilan</p>
                            </div>
                            <div class="col-5">
                                <select name="" id="" class="form-control form-control-sm fs-s-sm p-2">
                                    <option value="" selected>30 Days</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="icon-dashboard-panel" style="background: #ecfafd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#75dcf4" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                </svg>    
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600">{{number_format(2400)}}</p>
                                <p class="fs-s-sm">Jumlah Buku Dibuat</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row my-4 my-lg-auto">
            <div class="col-12 px-3">
                <div class="card border-0 rounded-1">
                    <div class="card-body">

                        <div class="border rounded-2">
                            <ul class="nav nav-pills border-bottom mb-3 mx-lg-4 mx-auto" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link border-bottom-white rounded-0 bg-transparent py-3 text-gray fw-400 active" data-bs-toggle="pill" data-bs-target="#pills-terbit" type="button" role="tab" aria-controls="pills-terbit" aria-selected="true">Diterbitkan</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link border-bottom-white rounded-0 bg-transparent py-3 text-gray fw-400" data-bs-toggle="pill" data-bs-target="#pills-draftku" type="button" role="tab" aria-controls="pills-draftku" aria-selected="false">Draft</a>
                                </li>
                            </ul>

                            <div class="tab-content mx-lg-4 mx-2" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-terbit" role="tabpanel" tabindex="0">
                                    <div class="table-responsive">
                                        <table class="table border-top">
                                            <tbody>
                                                <tr>
                                                    <td><img src="https://i.pinimg.com/originals/73/7a/47/737a47db82a662e28a44253d58162c1f.jpg" width="130px" class="object-fit-cover" height="130px" alt=""></td>
                                                    <td class="ps-3">
                                                        <p class="mb-1 text-gray fs-s-sm">Fantasy, Kerajaan, Action</p>
                                                        <a href="" class="fs-6 text-primary">Ranker's Who Return Back To School</a>
                                                        <p class="fs-s-sm text-gray my-2 two-line-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo illum minima fugiat aut neque. Sapiente fugit pariatur corrupti obcaecati vero? Ipsam a harum ipsa! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Non dicta, sint consequatur velit recusandae alias libero at dolor repudiandae fugit ab rem magni.</p>
                                                        <div class="badge badge-success fs-s-sm fw-500">
                                                            Active
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                
                                <div class="tab-pane height fade" id="pills-draftku" role="tabpanel" tabindex="0">
                                    <div class="text-center">
                                        <h4>WADUH, BELUM ADA KARYA DI DRAFT NIH ! ... BUAT YUK !</h4>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



