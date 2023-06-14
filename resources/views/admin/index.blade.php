@extends('admin.layout.index')

@section('content')

<div id="main-wrapper">
<center>
    <div class="container">
        <center class="mb-4">
            <h2>Dashboard Admin</h2>
        </center>
    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-primary"><span><i class="ri-file-copy-2-line"></i></span></div>
                <div class="widget-content">
                    <h3>{{$totaltransaksi->count()}}</h3>
                    <p>Total transaksi</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-success"><span><i class="ri-file-list-3-line"></i></span></div>
                <div class="widget-content">
                    <h3>Rp. {{number_format($totaltransaction)}}</h3>
                    <p>Total Pendapatan</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-warning"><span><i class="ri-file-paper-line"></i></span></div>
                <div class="widget-content">
                    <h3>Rp. {{number_format($kolom)}}</h3>
                    <p>Modal Penjualan</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-danger"><span><i class="ri-file-paper-2-line"></i></span></div>
                <div class="widget-content">
                    <h3>Rp. {{number_format($hasil)}}</h3>
                    <p>Laba</p>
                </div>
            </div>
        </div>
    </div>
    
</div>
</center>
</div>
@endsection