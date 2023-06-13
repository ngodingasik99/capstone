@extends('admin.layout.index')

@section('content')
<div class="content-body">
    <div class="container">
        <div class="card-header flex-row">
            <h4 class="card-title">
                <div class="input-group">
                    <div class="form-outline">
                        {{-- <div class="">Uang awal di kasir 300.000</div> --}}
                        {{-- <form action="/kelolakeuangan" method="GET">
                            <input type="search" id="form1" name="search" class="form-control" placeholder="Searching">
                        </form> --}}
                    </div>
                </div>    
            </h4>                    
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-plus-circle"></i>Add capital
            </button> --}}
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>tanggal</th>
                        <th>Nama</th>
                        <th>Biaya</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semua as $number => $item)
                    <tr>
                        <td>{{$number + $semua->firstItem()}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->biaya}}</td>
                        <td><img src="{{asset('storage/' . $item->foto_nota)}}" width="50px" height="50px" alt=""
                            class="me-2 rounded-circle"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="my-3 d-flex justify-content-center">
                {{$semua->onEachSide(0)->links()}}
            </div>
        </div>
    </div>
</div>
</div>
{{-- 
@foreach ($transactions as $item)
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
</div> --}}
@endsection

  
  