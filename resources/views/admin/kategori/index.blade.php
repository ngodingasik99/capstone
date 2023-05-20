@extends('admin.layout.index')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="card-header flex-row">
                <h4 class="card-title">Active Bids </h4>                    
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add category
                </button>
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
                        @foreach ($category as $item)
                        <tr>
                            <td class="">{{$loop->iteration}}</td>
                            <td>{{$item->category_name}}</td>
                            {{-- <td>{{$item->photo}}</td>  --}}
                            <td><img src="{{asset('storage/' . $item->photo)}}" width="50px" height="50px" alt=""
                                class="me-2 rounded-circle"></td>
                            <td>{{$item->description}}</td>
                            <td>
                                {{-- <span><i class="bi bi-pencil-square"></i></span> --}}
                                <a href="" data-bs-toggle="modal" data-bs-target="#update{{$item->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                {{-- <span><i class="ri-delete-bin-line"></i></span> --}}
                                <a href="/kategori/{{$item->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                    </svg></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                <input type="text" class="form-control @error ('category_name') is-invalid @enderror" id="category_name" name="category_name" value="{{$item->category_name}}">
                @error('category_name')
                    category name tidak boleh kosong
                @enderror
                </div>
                <div class="mb-3">
                <label for="photo" class="form-label">Image</label>
                <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo" value=""><br>
                <img src="{{asset('storage/' . $item->photo)}}" width="90px" alt="">
                @error('photo')
                    image tidak boleh kosong
                @enderror
                </div>
                <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error ('description') is-invalid @enderror" id="description" name="description" value="{{$item->description}}">
                @error('description')
                    description tidak boleh kosong
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
                  <input type="text" class="form-control @error ('category_name') is-invalid @enderror" id="category_name" name="category_name">
                  @error('category_name')
                  Category name tidak boleh kosong
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="photo" class="form-label">Image</label>
                  <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo">
                  @error('photo')
                    image tidak boleh kosong
                  @enderror
                </div>
                
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="text" class="form-control @error ('description') is-invalid @enderror" id="description" name="description">
                  @error('description')
                    description tidak boleh kosong
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

  
  