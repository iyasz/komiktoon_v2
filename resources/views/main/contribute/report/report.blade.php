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
                                        <ul class="nav nav-pills border-bottom mb-3 fs-sm mx-lg-4 mx-auto flex-nowrap overflow-auto"
                                            id="pills-tab" role="tablist">
                                            @foreach ($lastSevenMonths as $item)
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link border-bottom-white rounded-0 bg-transparent py-3 me-3 text-gray fw-400 {{ $loop->last ? 'active' : '' }}"
                                                        id="pills-{{ $item['bulan'] }}{{ $item['tahun'] }}-tab"
                                                        data-bs-toggle="pill"
                                                        href="#pills-{{ $item['bulan'] }}{{ $item['tahun'] }}"
                                                        role="tab"
                                                        aria-controls="pills-{{ $item['bulan'] }}{{ $item['tahun'] }}"
                                                        aria-selected="{{ $loop->last ? 'true' : 'false' }}">{{ $item['bulan'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach ($lastSevenMonths as $key => $item)
                                            {{-- <div>{{ print_r($item['jumlahHari']) }}</div> --}}
                                            <div class="tab-pane height fade {{ $loop->last ? 'show active' : '' }}"
                                                id="pills-{{ $item['bulan'] }}{{ $item['tahun'] }}" role="tabpanel"
                                                tabindex="0">
                                                <div class="table-responsive ">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <th class="fs-s-sm bg-semi-gray text-center">Tanggal</th>
                                                            <th class="fs-s-sm bg-semi-gray text-center">Jumlah Pembaca
                                                                {{ $item['bulan'] }}</th>
                                                            <th class="fs-s-sm bg-semi-gray text-center">Komentar</th>
                                                            <th class="fs-s-sm bg-semi-gray text-center">Like</th>
                                                        </tr>
                                                        @for ($i = $item['jumlahHari']; $i >= 1; $i--)
                                                            @php
                                                                $day = str_pad($i, 2, '0', STR_PAD_LEFT);
                                                                $viewCount = getViewCountByDate($item['tahun'], $item['bulanKe'], $day);
                                                                $commentCount = getCommentCountByDate($item['tahun'], $item['bulanKe'], $day);
                                                                $likeCount = getLikeCountByDate($item['tahun'], $item['bulanKe'], $day);
                                                            @endphp
                                                            @if ($viewCount != 0 || $commentCount != 0 || $likeCount != 0)
                                                                <tr>
                                                                    <td class="border-bottom text-center">
                                                                        {{ substr($item['tahun'], -2) }} - {{ $day }}</td>
                                                                    <td class="border-bottom text-center">
                                                                        {{ $viewCount }}</td>
                                                                    <td class="border-bottom text-center">
                                                                        {{ $commentCount }}</td>
                                                                    <td class="border-bottom text-center">
                                                                        {{ $likeCount }}</td>
                                                                </tr>
                                                            @endif
                                                        @endfor

                                                    </table>
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
