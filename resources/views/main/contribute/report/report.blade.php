@extends('layout.contribute')
@section('report-active', 'text-primary')

@section('content')
    <div class="mb-3">
        <div class="row">

            <div class="col-12 p-md-3 p-0">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class=" p-lg-3 p-0">
    
                            <div class="row mt-3">
                                <div class="col-12 mb-3">
                                    <h4 class="mb-0">Laporan Bulanan</h4>
                                    {{-- <a href="" class="btn btn-primary border-0 rounded-1 btn-sm fs-s-sm py-2 px-3">Pemasukan</a> --}}
                                </div>
                            </div>
                            <div class="border p-3">
                                <div class="row">
                                    {{-- <div class="col-lg-3 col-md-5 col-12">
                                        <select name="" id="" class="form-select w-100">
                                            <option value=""></option>
                                        </select>   
                                    </div> --}}
                                    
                                    <div class="">
                                        <ul class="nav nav-pills border-bottom mb-3 fs-sm mx-lg-4 mx-auto flex-nowrap overflow-auto" id="pills-tab" role="tablist">
                                            @foreach ($lastSevenMonths as $key => $item)
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link border-bottom-white rounded-0 bg-transparent py-3 me-3 text-gray fw-400 {{ $key === count($lastSevenMonths) - 1 ? 'active' : '' }}" data-bs-toggle="pill" data-bs-target="#pills-{{$item}}{{$key}}" type="button" role="tab" aria-controls="pills-{{$item}}{{$key}}" aria-selected="false">{{$item}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach ($lastSevenMonths as $key => $item)
                                        <div class="tab-pane height fade {{ $key === count($lastSevenMonths) - 1 ? 'show active' : '' }}" id="pills-{{$item}}{{$key}}" role="tabpanel" tabindex="0">
                                            <div class="bg-semi-gray">
                                                    <div class="table-responsive ">
                                                        <table class="table table-borderless">
                                                        <tr>
                                                            <th class="fs-s-sm">Tanggal</th>
                                                            <th class="fs-s-sm">Jumlah Pembaca</th>
                                                            <th class="fs-s-sm">Komentar</th>
                                                            <th class="fs-s-sm">Like</th>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                    {{-- <h1>{{$item}}</h1> --}}
                                                </div>
                                            </div>

                                        </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>

         
    </div>
@endsection

