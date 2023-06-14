@extends('admin.layout.index')

@section('content')
    <div class="content-body">
        <div class="container">
            <center class="mb-2">
                <h2>Management Product</h2>
            </center>
            <div class="card-header flex-row">
                <h4 class="card-title">
                    <div class="input-group">
                        <div class="form-outline">
                            <form action="/produk" method="GET">
                            <input type="search" id="form1" name="search" class="form-control" placeholder="Searching">
                        </form>
                        </div>
                    </div>    
                </h4>                    
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="bi bi-plus-circle"></i>  Add product
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product name</th>
                            <th>Image</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Category name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $number => $item)
                        <tr>
                            <td class="">{{$number + $product->firstItem()}}</td>
                            <td>{{$item->product_name}}</td>
                            <td>
                                @if (Storage::exists($item->photo))
                                    <img src="{{asset('storage/' . $item->photo)}}" alt="product" width="50px" height="50px"
                                    class="me-2 rounded-circle">    
                                @else
                                    <img src="{{asset('images/default-food.png')}}" alt="product" width="50px" height="50px"
                                    class="me-2 rounded-circle">
                                @endif
                            </td>
                            <td>{{$item->stock}}</td>
                            <td>Rp. {{number_format($item->price)}}</td>
                            <td>
                            @if (is_null($item->category_id))

                            @else
                            {{ $item->category->category_name }}
                            @endif
                            </td>
                            <td>
                                <button class="btn-primary btn-sm bi bi-pencil-square" data-bs-toggle="modal" data-bs-target="#update{{$item->id}}" data-bs-placement="bottom" title="edit"></button>
                                <button class="btn-danger btn-sm bi bi-trash" onclick="hapusproduk({{ $item->id }})" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-3 d-flex justify-content-center">
                    {{$product->onEachSide(0)->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($product as $item)
<!-- Modal Update -->
<div class="modal fade" id="update{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Form update product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/produk/{{$item->id}}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                <label for="product_name" class="form-label">Product name</label>
                <input type="text" class="form-control @error ('product_name') is-invalid @enderror" id="product_name" name="product_name" value="{{$item->product_name}}" required>
                @error('product_name')
                    {{ $message }}
                @enderror
                </div>
                <div class="mb-3">
                <label for="photo" class="form-label">Image</label>
                <input type="file" class="form-control @error ('photo') is-invalid @enderror" id="photo" name="photo" value="{{$item->photo}}"><br>
                <img src="{{asset('storage/' . $item->photo)}}" width="90px" alt="">
                @error('photo')
                    {{ $message }}
                @enderror    
                </div>
                <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control @error ('stock') is-invalid @enderror" id="stock" name="stock" value="{{$item->stock}}" required min="1">
                @error('stock')
                    {{ $message }}
                @enderror    
                </div>
                <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error ('price') is-invalid @enderror" id="price" name="price" value="{{$item->price}}" required min="0">
                @error('price')
                    {{ $message }}
                @enderror    
                </div>
                <div class="mb-3">
                <label for="category name" class="form-label">category name</label>
                <select class="form-select @error ('category_name') is-invalid @enderror" aria-label="Default select example" name="category_id" required>
                    <option selected></option>
                    @foreach ($category as $categoris)
                    <option value="{{ $categoris->id }}" {{$item->category_id == $categoris->id ? 'selected': ''}}>{{$categoris->category_name}}</option>
                    @endforeach
                </select>
                @error('category_name')
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
          <h5 class="modal-title" id="staticBackdropLabel">Form product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/produk/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="product_name" class="form-label">Product name</label>
                  <input type="text" class="form-control @error ('product_name') is-invalid @enderror" id="product_name" name="product_name" required>
                  @error('product_name')
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
                    <label for="stock" class="form-label">stock</label>
                    <input type="number" class="form-control @error ('stock') is-invalid @enderror" id="stock" name="stock" required min="1">
                    @error('stock')
                        {{ $message }}
                    @enderror
                  </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error ('price') is-invalid @enderror" id="price" name="price" required min="0">
                    @error('price')
                        {{ $message }}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category name</label>
                    <select class="form-select @error ('category_name') is-invalid @enderror" aria-label="Default select example" name="category_id" required>
                      <option selected></option>
                      @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{$item->category_name}}</option>
                      @endforeach
                    </select>
                    @error('category_name')
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

  
  