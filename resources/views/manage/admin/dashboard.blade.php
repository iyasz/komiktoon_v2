@extends('layout.main')
@section('active-dashboard', 'text-primary')

@section('content')
    <div id="app">
        <div class="row flex-nowrap overflow-auto">

            <div class="col-lg-4 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <p class="mb-0 fs-sm">Komik Aktif</p>
                            </div>
                            <div class="col-5">
                                <select id="komikAktif" class="form-control form-control-sm fs-s-sm p-2">
                                    <option value="7" >7 Days</option>
                                    <option value="30" selected>30 Days</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center  mt-2">
                            <div class="icon-dashboard-panel" style="background: #f3ecfd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#ac7af3" class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                </svg>    
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600" id="komikAktifText">{{number_format($contentCount)}}</p>
                                <p class="fs-s-sm">Jumlah Komik Aktif</p>
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
                                <p class="mb-0 fs-sm">Takedown</p>
                            </div>
                            <div class="col-5">
                                <select id="komikTakedown" class="form-control form-control-sm fs-s-sm p-2">
                                    <option value="7" >7 Days</option>
                                    <option value="30" selected>30 Days</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center mt-2">
                            <div class="icon-dashboard-panel" style="background: #fdecee">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#f37a88" class="bi bi-ban" viewBox="0 0 16 16">
                                    <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                                </svg>
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600" id="komikTakedownText">{{number_format($takedownCount)}}</p>
                                <p class="fs-s-sm">Jumlah Takedown</p>
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
                                <p class="mb-0 fs-sm">Laporan</p>
                            </div>
                            <div class="col-5">
                                <select id="komikReport" class="form-control form-control-sm fs-s-sm p-2">
                                    <option value="7" >7 Days</option>
                                    <option value="30" selected>30 Days</option>
                                   
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center  mt-2">
                            <div class="icon-dashboard-panel" style="background: #ecfafd">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#75dcf4" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                                </svg>
                            </div>
                            <div class="ms-3 mt-3">
                                <p class="mb-0 fw-600" id="reportKomikText">{{number_format($reportCount)}}</p>
                                <p class="fs-s-sm">Jumlah Laporan</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-8 col-12 mt-lg-auto mt-3 mb-3">

                <div class="row">
                    
                    <div class="col-12 pe-lg-0 pe-auto"  >
                        <div class="card border-0 rounded-1 h-100 ">
                            <div class="card-body">
                                <div class="title">
                                    <h5 class="fw-600 mb-1">Data Pembaca</h5>
                                    <p class="fs-s-sm">Laporan 7 hari terakhir banyaknya pembaca</p>
                                </div>
                                <div class="row flex-nowrap overflow-auto">
                                    <div class="col-12" style="min-width: 600px">
                                        <div><canvas id="statisticLineBar"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
        
            </div>

            <div class="col-lg-4 col-12 mb-3 ps-3">

                <div class="card border-0 rounded-1 h-100 ">
                    <div class="card-body">
                        <div class="title">
                            <h5 class="fw-600 mb-1">Komik Status</h5>
                            <p class="fs-s-sm">Laporan Staus Komik {{ \Carbon\Carbon::now()->translatedFormat('F') }} {{\Carbon\Carbon::now()->year}}</p>
                        </div>
                        <div><canvas id="statisticDoughnuteBar"></canvas></div>
                    </div>
                </div>

            </div>
            
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <script>
        $('#komikAktif').on('change', function(){
            let data = new FormData();
            data.append('dataActive', $('#komikAktif').val());
            
            axios.post(window.location.href, data).then(function (response) {
                $('#komikAktifText').text(response.data.contentCount.toLocaleString())
            });

        })

        $('#komikTakedown').on('change', function(){
            let data = new FormData();
            data.append('dataTakedown', $('#komikTakedown').val());
            
            axios.post(window.location.href, data).then(function (response) {
                $('#komikTakedownText').text(response.data.takedownCount.toLocaleString())
            });

        })

        $('#komikReport').on('change', function(){
            let data = new FormData();
            data.append('dataReport', $('#komikReport').val());
            
            axios.post(window.location.href, data).then(function (response) {
                $('#reportKomikText').text(response.data.reportCount.toLocaleString())
            });
        })
    </script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            // LINE CHART 

            const chartData = <?php echo $data7toJson; ?>;

            const labels = chartData.map(data => data.date);
            const viewTotals = chartData.map(data => data.viewTotal);

            const data = {
                labels: labels.reverse(),   
                datasets: [{
                    label: 'Jumlah Pembaca',
                    data: viewTotals.reverse(),
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.3
                }]
            };

            const lineChart = {
                type: 'line',
                data: data,
                options: {
                    plugins: {
                    legend: {
                        display: false 
                        }
                    },
                    responsive: true,
                },
                
            };

            const ctx1 = document.getElementById('statisticLineBar').getContext('2d');
            new Chart(ctx1, lineChart);
        });

        // END LINE CHART 

        // DOUGHNUT CHART 
        const waitCount = <?php echo $komikUpdatedCount; ?>;
        const takedownCount = <?php echo $komikTakedownCount; ?>;
        const activeCount = <?php echo $komikActiveCount; ?>;

        const data = {

        labels: ['Takedown', 'Active', 'Waiting'],

        
        datasets: [{
            data: [takedownCount,activeCount ,waitCount],
            backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
            ],
            hoverOffset: 10
         }]
        };

        const doughnut = {
            type: 'doughnut',
            data: data,
            options: {
                cutout: '45%',
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom', 
                    },
                },
            },
                
        };

        const ctx2 = document.getElementById('statisticDoughnuteBar').getContext('2d');
        new Chart(ctx2, doughnut);


        // END DOUGHNUT CHART 

    </script>



@endpush


