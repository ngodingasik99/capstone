@extends('admin.layout.index')


@section('content')
<div class="content-body">
    <div class="container">
        <div class="card-header flex-row">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-circle"></i> Add Category</button>
        </div> 

            <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="/akunkasir/store" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="photo" class="form-label">Image</label>
                            <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo" required>
                            @error('photo')
                                {{ $message }}
                            @enderror
                        </div>

                        <div class="mb-3">
                        <label for="nama_depan" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control @error ('nama_depan') is-invalid @enderror" id="nama_depan" name="nama_depan" required>
                        @error('nama_depan')
                            {{ $message }}
                        @enderror
                        </div>

                        <div class="mb-3">
                        <label for="nama_belakang" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control @error ('nama_belakang') is-invalid @enderror" id="nama_belakang" name="nama_belakang" required>
                        @error('nama_belakang')
                            {{ $message }}
                        @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error ('alamat') is-invalid @enderror" id="alamat" name="alamat" required>
                            @error('alamat')
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
    {{-- <div class="card-body"> --}}
    <table class="table table-striped">
        <tr>
            <th>Nomor</th>
            <th>photo</th>
            <th>Nama depan</th>
            <th>Nama belakang</th>
            <th>Alamat</th>
        </tr>
        @foreach($data_akunkasirs as $item)
        <tr>
            <td>{{$item['id']}}</td>
            <td>{{$item['photo']}}</td>
            <td>{{$item['nama_depan']}}</td>
            <td>{{$item['nama_belakang']}}</td>
            <td>{{$item['alamat']}}</td>
        </tr>
        @endforeach
    </table>
    </div>
    </div>


@endsection
