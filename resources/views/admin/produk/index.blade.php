@extends('admin.layout.index')

@section('content')
        <div class="content-body">
            <div class="container">
                <div class="card-header flex-row">
                    <h4 class="card-title">Active Bids </h4>                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Add product
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Category name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="">1</td>
                                <td>Amirudin</td>
                                <td><img src="{{asset('enftx-html.vercel.app')}}/images/avatar/1.jpg" alt="" width="40"
                                    class="me-2 rounded-circle"></td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat aut fuga nostrum praesentium sed animi unde.</td>
                                <td>100</td>
                                <td>15.000</td>
                                <td>nama kategori nya</td>
                                <td>
                                    {{-- <span><i class="bi bi-pencil-square"></i></span> --}}
                                    <a href="" data-bs-toggle="modal" data-bs-target="#update"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>
                                    {{-- <span><i class="ri-delete-bin-line"></i></span> --}}
                                    <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                        </svg></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="update" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form update product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/kategori/" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                <label for="product_name" class="form-label">Product name</label>
                <input type="text" class="form-control @error ('product_name') is-invalid @enderror" id="product_name" name="product_name" value="">
                </div>
                @error('product_name')
                <div class="invalid-feedback">
                    product name tidak boleh kosong
                </div>
                @enderror
                <div class="mb-3">
                <label for="photo" class="form-label">Image</label>
                <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo" value=""><br>
                <img src="" width="90px" alt="">
                </div>
                @error('photo')
                <div class="invalid-feedback">
                    image tidak boleh kosong
                </div>
                @enderror
                <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error ('description') is-invalid @enderror" id="description" name="description" value="">
                </div>
                @error('description')
                <div class="invalid-feedback">
                    description tidak boleh kosong
                </div>
                @enderror
                <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control @error ('stock') is-invalid @enderror" id="stock" name="stock" value="">
                </div>
                @error('stock')
                <div class="invalid-feedback">
                    stock tidak boleh kosong
                </div>
                @enderror
                <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error ('price') is-invalid @enderror" id="price" name="price" value="">
                </div>
                @error('price')
                <div class="invalid-feedback">
                    price tidak boleh kosong
                </div>
                @enderror
                <div class="mb-3">
                <label for="category name" class="form-label">category name</label>
                <select class="form-select @error ('category_name') is-invalid @enderror" aria-label="Default select example" name="category_id">
                    <option selected></option>
                    {{-- @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{$product->category_id == $category->id ? 'selected': ''}}>
                        {{$category->name}}
                    </option>
                    @endforeach --}}
                  </select>
                </div>
                @error('category_name')
                <div class="invalid-feedback">
                    category name tidak boleh kosong
                </div>
                @enderror
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    </div>
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
            <form action="/kategori/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="product_name" class="form-label">Product name</label>
                  <input type="text" class="form-control @error ('product_name') is-invalid @enderror" id="product_name" name="product_name">
                </div>
                @error('product_name')
                <div class="invalid-feedback">
                    product name tidak boleh kosong
                </div>
                @enderror
                <div class="mb-3">
                  <label for="photo" class="form-label">Image</label>
                  <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo">
                </div>
                @error('photo')
                <div class="invalid-feedback">
                    image tidak boleh kosong
                </div>
                @enderror
                <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <input type="text" class="form-control @error ('description') is-invalid @enderror" id="description" name="description">
                </div>
                @error('description')
                <div class="invalid-feedback">
                    description tidak boleh kosong
                </div>
                @enderror
                <div class="mb-3">
                  <label for="stock" class="form-label">stock</label>
                  <input type="text" class="form-control @error ('stock') is-invalid @enderror" id="stock" name="stock">
                </div>
                @error('stock')
                <div class="invalid-feedback">
                    stock tidak boleh kosong
                </div>
                @enderror
                <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="text" class="form-control @error ('price') is-invalid @enderror" id="price" name="price">
                </div>
                @error('price')
                <div class="invalid-feedback">
                    price tidak boleh kosong
                </div>
                @enderror
                <div class="mb-3">
                  <label for="category_name" class="form-label">Category name</label>
                  <select class="form-select @error ('category_name') is-invalid @enderror" aria-label="Default select example" name="category_name">
                    <option selected></option>
                    {{-- @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{$item->id}} - {{$item->name}}</option>
                    @endforeach --}}
                  </select>
                  {{-- <input type="text" class="form-control @error ('category_name') is-invalid @enderror" id="category_name" name="category_name"> --}}
                </div>
                @error('category_name')
                <div class="invalid-feedback">
                    category name tidak boleh kosong
                </div>
                @enderror
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

  
  