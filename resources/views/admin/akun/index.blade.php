@extends('admin.layout.index')

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
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-circle"></i> Create Account</button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user => $item)
                        <tr>
                            <td>{{$user + $users->firstItem()}}</td>
                            <td><img src="{{asset('storage/' . $item->photo)}}" width="50px" height="50px" alt=""
                                class="me-2 rounded-circle"></td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->role}}</td>
                            <td>
                                <button class="btn-primary btn-sm bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#update{{$item->id}}" data-bs-placement="bottom" title="edit"></button>
                                <button class="btn-danger btn-sm bi bi-trash" onclick="hapusakun({{ $item->id }})" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-3 d-flex justify-content-center">
                    {{$users->onEachSide(0)->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($users as $item)
<!-- Modal Update -->
<div class="modal fade" id="update{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form update user</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/akun/{{$item->id}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error ('name') is-invalid @enderror" id="name" name="name" value="{{ $item->name }}">
                    @error('name')
                      {{ $message }}
                    @enderror
                </div>
                <div class="mb-3"><label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" value="{{ $item->email }}" required>
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo"><br>
                    <img src="{{asset('storage/' . $item->photo)}}" width="90px" alt="">
                    @error('photo')
                      {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control @error ('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
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
          <h5 class="modal-title" id="staticBackdropLabel">Form Create Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/akun/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control @error ('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                  @error('name')
                    {{ $message }}
                  @enderror
                </div>
                <div class="mb-3"><label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select @error ('role') is-invalid @enderror" aria-label="Default select example" name="role" required>
                        <option selected disabled>Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="kasir">Kasir</option>
                    </select>
                    @error('role')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Photo</label>
                    <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo" required>
                    @error('photo')
                      {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control @error ('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                      {{ $message }}
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

  
  