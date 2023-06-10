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
                    <h3>{{$total->count()}}</h3>
                    <p>Total transaksi</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-success"><span><i class="ri-file-list-3-line"></i></span></div>
                <div class="widget-content">
                    <h3>Rp. {{$total->count()}}</h3>
                    <p>Total Pendapatan</p>
                </div>
            </div>
        </div>
        @foreach ($pendapatan as $item)            
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-warning"><span><i class="ri-file-paper-line"></i></span></div>
                <div class="widget-content">
                    <h3>Rp. {{number_format($item->modal)}}</h3>
                    <p>Modal Penjualan</p>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-xl-3 col-sm-6">
            <div class="stat-widget d-flex align-items-center">
                <div class="widget-icon me-3 bg-danger"><span><i class="ri-file-paper-2-line"></i></span></div>
                <div class="widget-content">
                    <h3>Rp. {{number_format($oke)}}</h3>
                    <p>Laba</p>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-xxl-6 col-xl-8 col-lg-6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    {!! $monthlyTransactionChart->container() !!}
                </div>
            </div>
        </div>
    </div>
    </div> --}}

{{-- <script src="{{ $monthlyTransactionChart->cdn() }}"></script> --}}

{{-- {{ $monthlyTransactionChart->script() }} --}}

</div>
</center>
</div>
@endsection