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
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product name</th>
                        <th>Image</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                        <th>Total</th>
                        <th>Code transaction</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user => $item) --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td><img src="" width="50px" height="50px" alt=""
                            class="me-2 rounded-circle"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="btn-primary btn-sm bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#update" data-bs-placement="bottom" title="edit"></button>
                            <button class="btn-danger btn-sm bi bi-trash" onclick="hapusakun()" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></button>
                        </td>
                    </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
            <div class="my-3 d-flex justify-content-center">
                {{-- {{$users->onEachSide(0)->links()}} --}}
            </div>
        </div>
    </div>
</div>
@endsection