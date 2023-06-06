@extends('admin.layout.index')

@section('content')
<div class="content-body">
    <div class="container">
        <div class="card-header flex-row">
            <h4 class="card-title">
                <div class="input-group">
                    <div class="form-outline">
                        <form action="/kelolakeuangan" method="GET">
                        <input type="search" id="form1" name="search" class="form-control" placeholder="Searching">
                    </form>
                    </div>
                </div>    
            </h4>                    
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-plus-circle"></i>Add capital
            </button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jumlah modal</th>
                        <th>Total transaksi</th>
                        <th>Uang akhir</th>
                        <th>Laba</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($product as $number => $item) --}}
                    @foreach ($keuangan as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>Rp. {{number_format($item->modal)}}</td>
                        <td>900</td>
                        <td>15.000.000</td>
                        <td>10.000.000</td>
                        <td>19-09-1999</td>
                        <td>
                            <button class="btn-primary btn-sm bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#update{{$item->id}}" data-bs-placement="bottom" title="edit"></button>
                            <button class="btn-danger btn-sm bi bi-trash" onclick="hapusmodal({{ $item->id }})" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-3 d-flex justify-content-center">
                {{-- {{$product->onEachSide(0)->links()}} --}}
            </div>
        </div>
    </div>
</div>
</div>

@foreach ($keuangan as $item)
<!-- Modal Update -->
<div class="modal fade" id="update{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form update modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kelolakeuangan/{{$item->id}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                <label for="modal" class="form-label">Modal</label>
                <input type="text" class="form-control @error ('modal') is-invalid @enderror" id="modal" name="modal" value="{{$item->modal}}" required>
                @error('modal')
                    {{ $message }}
                @enderror
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
@endforeach
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Form modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kelolakeuangan/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="modal" class="form-label">Modal</label>
                  <input type="text" class="form-control @error ('modal') is-invalid @enderror" id="modal" name="modal" required>
                  @error('modal')
                    {{ $message }}
                  @enderror
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

  
  