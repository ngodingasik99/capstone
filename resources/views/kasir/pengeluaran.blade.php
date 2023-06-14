@extends('kasir.index')

@section('content')
@include('sweetalert::alert')
<div class="content-body">
    <div class="container">
        <h3>Pengeluaran Tanggal {{ $today }}</h3>
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
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <i class="bi bi-plus-circle"></i>  Tambah Pengeluaran
            </button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pengeluaran</th>
                        <th>Biaya</th>
                        <th>Nota</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengeluarans as $pengeluaran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengeluaran->nama }}</td>
                        <td>Rp. {{ number_format($pengeluaran->biaya) }}</td>
                        <td><img src="{{asset('storage/' . $pengeluaran->foto_nota)}}" alt="" width="50px" height="50px" class="me-2 rounded-circle"></td>
                        <td>{{ $pengeluaran->created_at }}</td>
                        <td>
                            <button class="btn-primary btn-sm bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#update{{$pengeluaran->id}}" data-bs-placement="bottom" title="edit" title="Edit"></button>
                            <button class="btn-danger btn-sm bi bi-trash" onclick="hapuspengeluaran({{ $pengeluaran->id }})" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></button>
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
@foreach ($pengeluarans as $pengeluaran)
<!-- Modal Update -->
<div class="modal fade" id="update{{$pengeluaran->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form update pengeluaran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kasir/pengeluaran/{{$pengeluaran->id}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Keterangan Pengeluaran</label>
                    <input type="text" class="form-control @error ('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $pengeluaran->nama }}" required>
                    @error('nama')
                      {{ $message }}
                    @enderror
                  </div>
                  <div class="mb-3">
                      <label for="biaya" class="form-label">Biaya</label>
                      <input type="number" class="form-control @error ('biaya') is-invalid @enderror" id="biaya" name="biaya" value="{{ $pengeluaran->biaya }}" required min="0">
                      @error('biaya')
                          {{ $message }}
                      @enderror
                  </div>
                  <div class="mb-3">
                      <label for="foto_nota" class="form-label">Nota</label>
                      <input type="file" class="form-control @error ('foto_nota') is-invalid @enderror" id="foto_nota" name="foto_nota">
                      @error('foto_nota')
                          {{ $message }}
                      @enderror
                      <div class="mt-3">
                        <img src="{{asset('storage/' . $pengeluaran->foto_nota)}}" width="90px" alt="">
                      </div>
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
          <h5 class="modal-title" id="staticBackdropLabel">Form pengeluaran</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kasir/pengeluaran/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Keterangan Pengeluaran</label>
                  <input type="text" class="form-control @error ('nama') is-invalid @enderror" id="nama" name="nama" required>
                  @error('nama')
                    {{ $message }}
                  @enderror
                </div>
                <div class="mb-3">
                    <label for="biaya" class="form-label">Biaya</label>
                    <input type="number" class="form-control @error ('biaya') is-invalid @enderror" id="biaya" name="biaya" required min="0">
                    @error('biaya')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto_nota" class="form-label">Nota</label>
                    <input type="file" class="form-control @error ('foto_nota') is-invalid @enderror" id="foto_nota" name="foto_nota" required>
                    @error('foto_nota')
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

<script type="text/javascript">
    
    function hapuspengeluaran(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "Confirm Delete!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                window.location.href = "/pengeluaran/" + id
            }
        })
    }
</script>

@endsection
