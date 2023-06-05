@extends('admin.layout.index')

@section('content')

<div id="main-wrapper">
<center>
    <div class="container">
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-primary"><span><i class="ri-file-copy-2-line"></i></span></div>
                <div class="widget-content">
                    <h3>1000</h3>
                    <p>Total transaksi</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-success"><span><i class="ri-file-list-3-line"></i></span></div>
                <div class="widget-content">
                    <h3>25.000.000</h3>
                    <p>Pendapatan</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-warning"><span><i class="ri-file-paper-line"></i></span></div>
                <div class="widget-content">
                    <h3>15.000.000</h3>
                    <p>Modal</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-danger"><span><i class="ri-file-paper-2-line"></i></span></div>
                <div class="widget-content">
                    <h3>5.000.000</h3>
                    <p>Laba</p>
                </div>
            </div>
        </div>
    </div>



<div class="col-xxl-6 col-xl-8 col-lg-6">
<div class="row">
    <div class="col">
        <div class="card">
            {{-- <div class="card-header">
                <h4 class="card-title">Transaction Monthly</h4>
            </div> --}}
            <div class="card-body">

                {!! $monthlyTransactionChart->container() !!}
            </div>
        </div>
    </div>
</div>

<div class="container">
<div id="user-activity" class="card">
    <div class="card-header">
        <h4 class="card-title">ETH Priceeee</h4>
    </div>
    <div class="card-body">
        <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
                <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
            </div>
        </div><canvas height="280" width="670" id="activity"
            style="display: block; width: 670px; height: 280px;"
            class="chartjs-render-monitor"></canvas>
    </div>
</div>
</div>
</div>

<script src="{{ $monthlyTransactionChart->cdn() }}"></script>

{{ $monthlyTransactionChart->script() }}

</div>
</center>
</div>
@endsection