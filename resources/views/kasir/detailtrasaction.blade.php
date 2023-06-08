@extends('kasir.index')

@section('content')
@include('sweetalert::alert')
<div class="content-body">
    <div class="container">
        <div class="card-header flex-row">
            <h4 class="card-title">
                <div class="input-group">
                    <div class="form-outline">
                        <form action="/akun" method="GET">
                            <input type="search" id="form1" name="search" class="form-control" placeholder="Searching">
                      </form>
                    </div>
                </div>
            </h4>
            <div class="">
                Total : Rp. {{ number_format($total) }}
            </div>
            <div class="">
                Transaction Code : {{ $trsCode->transaction_code }}
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Sub total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trsDetail as $detail)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detail->product_name }}</td>
                        <td>{{ $detail->qty }}</td>
                        <td>{{ number_format($detail->price) }}</td>
                        <td>{{ number_format($detail->subtotal) }}</td>
                        <td>{{ $detail->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-3 d-flex justify-content-center">
                {{-- {{$users->onEachSide(0)->links()}} --}}
            </div>
        </div>
    </div>
</div>
@endsection