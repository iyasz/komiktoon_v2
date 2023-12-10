@extends('layout.main')

@section('content')
    <div class="">
        <div class="row flex-nowrap overflow-auto">

            <div class="col-lg-4 col-12 p-3">
                <div class="card border-0 rounded-1 h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <p class="mb-0 fs-sm">New Sales Order</p>
                            </div>
                            <div class="col-5">
                                <select name="" id="" class="form-control form-control-sm fs-s-sm p-2">
                                    <option value="" selected>30 Days</option>
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
                                <p class="mb-0 fw-600">{{number_format(2400)}}</p>
                                <p class="fs-s-sm">Jumlah Buku Dibuat</p>
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
                                <p class="mb-0 fs-sm">New Sales Order</p>
                            </div>
                            <div class="col-5">
                                <select name="" id="" class="form-control form-control-sm fs-s-sm p-2">
                                    <option value="" selected>30 Days</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center  mt-2">
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
                                <p class="mb-0 fs-sm">New Sales Order</p>
                            </div>
                            <div class="col-5">
                                <select name="" id="" class="form-control form-control-sm fs-s-sm p-2">
                                    <option value="" selected>30 Days</option>
                                </select>
                            </div>

                        </div>
                        <div class="d-flex align-items-center  mt-2">
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

        <div class="row">
            <div class="col-lg-8 col-12 mt-lg-auto mt-3 mb-3">

                <div class="row flex-nowrap overflow-auto">
                    
                    <div class="col-12 pe-lg-0 pe-auto" >
                        <div class="card border-0 rounded-1 h-100 ">
                            <div class="card-body">
                                <div><canvas id="statisticLineBar"></canvas></div>
                            </div>
                        </div>
                    </div>
            
                </div>
        
            </div>

            <div class="col-lg-4 col-12 mb-3 text-center ps-3">

                <div class="card border-0 rounded-1 h-100 ">
                    <div class="card-body">
                        <div><canvas id="statisticDoughnuteBar"></canvas></div>
                    </div>
                </div>

            </div>
            
        </div>

        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Content</th>
                                <th>Type</th>
                                <th>Group</th>
                                <th>Author</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td class="d-flex ">
                                    <img src="https://i.pinimg.com/564x/e7/e8/2f/e7e82f89118bf7e0fe231205874092f0.jpg" width="60px" height="60px" class="rounded-1" alt="">
                                    <div class="ms-4">
                                        <a href="" class="mb-0 fw-500 text-dark text-decoration-none">Seseorang yang keren</a>
                                        <p class="mb-0 fs-s-sm opacity-75">Young jin park</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-success">
                                        Manhwa
                                    </div>
                                </td>
                                <td>Toei Animation</td>
                                <td>Queen Elsa</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm border-0 rounded-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                          </svg>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td class="d-flex ">
                                    <img src="https://i.pinimg.com/564x/e7/e8/2f/e7e82f89118bf7e0fe231205874092f0.jpg" width="60px" height="60px" class="rounded-1" alt="">
                                    <div class="ms-4">
                                        <a href="" class="mb-0 fw-500 text-dark text-decoration-none">Seseorang yang keren</a>
                                        <p class="mb-0 fs-s-sm opacity-75">Young jin park</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-danger">
                                        Manhwa
                                    </div>
                                </td>
                                <td>Toei Animation</td>
                                <td>Queen Elsa</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm border-0 rounded-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                          </svg>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td class="d-flex ">
                                    <img src="https://i.pinimg.com/564x/e7/e8/2f/e7e82f89118bf7e0fe231205874092f0.jpg" width="60px" height="60px" class="rounded-1" alt="">
                                    <div class="ms-4">
                                        <a href="" class="mb-0 fw-500 text-dark text-decoration-none">Seseorang yang keren</a>
                                        <p class="mb-0 fs-s-sm opacity-75">Young jin park</p>
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-confirmed">
                                        Manhwa
                                    </div>
                                </td>
                                <td>Toei Animation</td>
                                <td>Queen Elsa</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm border-0 rounded-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                          </svg>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('javascript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            // LINE CHART 

            const today = new Date();
            const labels = Array.from({ length: 7 }, (_, i) => {
            const date = new Date(today);
            date.setDate(today.getDate() - i);
            return date.toLocaleDateString(undefined, { day: 'numeric', month: 'short' });
            });

            const data = {
                labels: labels.reverse(),
                datasets: [{
                    label: 'Jumlah Content Baru Diterbitkan',
                    data: [65, 59, 80, 81, 56, 55, 40],
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

        const data = {

        labels: ['Year', 'Month', 'Day'],

        datasets: [{
            data: [300, 50, 100],
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


