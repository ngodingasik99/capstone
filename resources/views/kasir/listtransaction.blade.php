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
            <!-- Button trigger modal -->
            <div class="text-muted">
                Total : Rp. {{ number_format($totaltransaction) }}
            </div>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#closing"><i class="bi bi-plus-circle"></i> Closing</button>
        </div>
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
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->transaction_code }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>Rp. {{ number_format($transaction->total) }}</td>
                        <td>
                            <a href="/kasir/detailtrasaction/{{ $transaction->id }}" class="btn-primary btn-sm bi bi-info-circle-fill" title="Detail"></a>
                            <a href="#" class="btn-primary btn-sm bi bi-printer-fill" title="Print"></a>
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
<!-- Modal closing-->
<div class="modal fade" id="closing" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="closingLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="closingLabel">Closing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    <div class="modal-body">
        <form action="/kasir/closing" method="post">
            @csrf
            <div class="mb-3">
                <label for="total_transaction" class="col-form-label">Penghasilan hari ini:</label>
                <input type="text" class="form-control" id="total_transaction" name="total_transaction" value="{{ $totaltransaction }}" readonly>
            </div>
            <div class="mb-3">
                <label for="pengeluaran" class="col-form-label">Pengeluaran hari ini:</label>
                <input type="text" class="form-control" id="pengeluaran" name="pengeluaran" id="recipient-name" value="{{ $totalpengeluaran }}" readonly>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>
</div>



@endsection
