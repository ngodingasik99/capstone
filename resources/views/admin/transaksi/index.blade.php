@extends('admin.layout.index')

@section('content')
@include('sweetalert::alert')
<div class="content-body">
    <div class="container">
        <center class="mb-2">
            <h2>List Transaction</h2>
        </center>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Code transaction</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaction as $transactions)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transactions->transaction_code }}</td>
                        <td>{{ $today }}</td>
                        <td>Rp. {{ number_format($transactions->total)}}</td>
                        <td>
                            <a href="/transaksi/detailtrasaction/{{ $transactions->id }}" class="btn-primary btn-sm bi bi-info-circle-fill" title="Detail"></a>
                        </td>
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
</div>
@endsection
