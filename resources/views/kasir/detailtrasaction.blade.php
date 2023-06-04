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
                Code Transaction
            </div>
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
                        <th>Sub total</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user => $item) --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td><img src="" class="img-fluid rounded mb-3" width="50px" height="50px" alt=""></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="/kasir/detailtrasaction" class="btn-primary btn-sm bi bi-pencil-square" title="Detail"></a>
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