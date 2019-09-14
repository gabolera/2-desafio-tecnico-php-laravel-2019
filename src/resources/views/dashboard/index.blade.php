@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Detalhes de vendas</h3>
        </div>
        </div>
        <!-- End Page Header -->
        <!-- Small Stats Blocks -->
        <div class="row">
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                    <span class="stats-small__label text-uppercase">Vendas Hoje</span>
                    <h6 class="stats-small__value count my-3">{{$vendas_hoje}}</h6>
                </div>
                <div class="stats-small__data">
                    {{-- <span class="stats-small__percentage stats-small__percentage--increase">4.7%</span> --}}
                </div>
                </div>
                {{-- <canvas height="120" class="blog-overview-stats-small-1"></canvas> --}}
            </div>
            </div>
        </div>
        <div class="col-lg col-md-6 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                    <span class="stats-small__label text-uppercase">Total Vendido Hoje</span>
                    <h6 class="stats-small__value count my-3">R$ {{$total_vendido_hoje}}</h6>
                </div>
                <div class="stats-small__data">
                    {{-- <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span> --}}
                </div>
                </div>
                {{-- <canvas id="valor_total" height="120" ></canvas> --}}
            </div>
            </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                    <span class="stats-small__label text-uppercase">Comments</span>
                    <h6 class="stats-small__value count my-3">8,147</h6>
                </div>
                <div class="stats-small__data">
                    <span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span>
                </div>
                </div>
                <canvas height="120" class="blog-overview-stats-small-3"></canvas>
            </div>
            </div>
        </div>
        <div class="col-lg col-md-4 col-sm-6 mb-4">
            <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                    <span class="stats-small__label text-uppercase">Users</span>
                    <h6 class="stats-small__value count my-3">2,413</h6>
                </div>
                <div class="stats-small__data">
                    <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                </div>
                </div>
                <canvas height="120" class="blog-overview-stats-small-4"></canvas>
            </div>
            </div>
        </div>
        <div class="col-lg col-md-4 col-sm-12 mb-4">
            <div class="stats-small stats-small--1 card card-small">
            <div class="card-body p-0 d-flex">
                <div class="d-flex flex-column m-auto">
                <div class="stats-small__data text-center">
                    <span class="stats-small__label text-uppercase">Subscribers</span>
                    <h6 class="stats-small__value count my-3">17,281</h6>
                </div>
                <div class="stats-small__data">
                    <span class="stats-small__percentage stats-small__percentage--decrease">2.4%</span>
                </div>
                </div>
                <canvas height="120" class="blog-overview-stats-small-5"></canvas>
            </div>
            </div>
        </div>
        </div>
        <!-- End Small Stats Blocks -->
        <div class="row">
        <!-- Users Stats -->


        <!-- End Top Referrals Component -->
        </div>
    </div>
        <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Meu site :)</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://github.com/dshy1/PHP-Challenge-Laravel-2">GitHub Project</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Linkedin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li>
          </ul>
          <span class="copyright ml-auto my-auto mr-2">Copyright © 2018
            <a href="https://designrevision.com" rel="nofollow">DesignRevision</a>
          </span>
        </footer>
      </main>
@endsection

@section('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="{{asset('scripts/shards-dashboards.1.1.0.min.js')}}"></script>
<script src="{{asset('scripts/app/app-blog-overview.1.1.0.min.js')}}"></script> --}}

<script>

// var ctx = document.getElementById('valor_total');
// var myChart = new Chart(ctx, {
//     type: 'line',
//     fill: true,
//     data: {
//         datasets: [{
//             label: 'Vendido R$',
//             data: [{
//                     x: '20/03/2019',
//                     y: '2000'
//                   }, {
//                     x: '20/09/2019',
//                     y: '5000'
//                   }],
//             backgroundColor: [
//                 'rgba(153, 102, 255, 0.2)',
//             ],
//             borderColor: [
//                 'rgba(153, 102, 255, 1)',
//             ],
//             borderWidth: 1
//         }]
//     },

// });

</script>
@endsection