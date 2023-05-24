@extends('admin.layout.index')

@section('content')
@include('sweetalert::alert')
    <div class="content-body">
        <div class="container">
            <div class="card-header flex-row">
                <h4 class="card-title">
                    <div class="input-group">
                        <div class="form-outline">
                          <form action="/kategori" method="GET">
                            <input type="search" id="form1" name="search" class="btn btn-outline-primary" placeholder="Searching"/>
                        </form>
                        </div>
                    </div>    
                </h4>                    
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-plus-circle"></i> Add Category</button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $number => $item)
                        <tr>
                            <td>{{$number + $category->firstItem()}}</td>
                            <td>{{$item->category_name}}</td>
                            <td><img src="{{asset('storage/' . $item->photo)}}" width="50px" height="50px" alt=""
                                class="me-2 rounded-circle"></td>
                            <td>{{$item->description}}</td>
                            <td>
                                <button class="btn-primary btn-sm bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#update{{$item->id}}" data-bs-placement="bottom" title="edit"></button>
                                <button class="btn-danger btn-sm bi bi-trash" onclick="hapuskategori({{ $item->id }})" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-3 d-flex justify-content-center">
                    {{$category->onEachSide(0)->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($category as $item)
<!-- Modal Update -->
<div class="modal fade" id="update{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form update category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kategori/{{$item->id}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                <label for="category_name" class="form-label">Category name</label>
                <input type="text" class="form-control @error ('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{$item->category_name}}" required>
                @error('category_name')
                    {{ $message }}
                @enderror
                </div>
                <div class="mb-3">
                <label for="photo" class="form-label">Image</label>
                <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo" value=""><br>
                <img src="{{asset('storage/' . $item->photo)}}" width="90px" alt="">
                @error('photo')
                    {{ $message }}
                @enderror
                </div>
                <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error ('description') is-invalid @enderror" id="description" name="description" value="{{$item->description}}" required>
                @error('description')
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
          <h5 class="modal-title" id="staticBackdropLabel">Form category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kategori/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="category_name" class="form-label">Category name</label>
                  <input type="text" class="form-control @error ('category_name') is-invalid @enderror" id="category_name" name="category_name" required>
                  @error('category_name')
                    {{ $message }}
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="photo" class="form-label">Image</label>
                  <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo" required>
                  @error('photo')
                    {{ $message }}
                  @enderror
                </div>
                
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="text" class="form-control @error ('description') is-invalid @enderror" id="description" name="description" required>
                  @error('description')
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

@endsection

  
  