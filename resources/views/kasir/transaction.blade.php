@extends('kasir.index')

@section('content')
<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card filter-tab m-0 product_data">
                    <div class="card-body bs-0 p-0 bg-transparent">
                        <div class="row">
                            @foreach ($kasir as $item)
                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="card items">
                                    <form action="/add-to-cart/{{ $item->id }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="items-img position-relative">
                                                @if (Storage::exists($item->photo))
                                                    <img src="{{asset('storage/' . $item->photo)}}" style="width:500px; height:400px;" class="img-fluid rounded mb-3" alt="product">
                                                @else
                                                    <img src="{{asset('images/default-food.png')}}" style="width:500px; height:400px;" class="img-fluid rounded mb-3" alt="product">
                                                @endif
                                            </div>
                                            <h4 class="card-title">{{$item->product_name}}</h4>
                                            <p></p>
                                            <div class="d-flex justify-content-between">
                                                <div class="text-start">
                                                    <p class="mb-2">Stok</p>
                                                    <h5 class="text-muted">{{$item->stock}}</h5>
                                                </div>
                                                <div class="text-start justify-content-center">
                                                    <p class="mb-2 ">Qty</p>
                                                    <input type="number" class="qty-input" name="qty" min="1">
                                                </div>
                                                <div class="text-end">
                                                    <p class="mb-2">Harga</strong></p>
                                                    <h5 class="text-muted">{{$item->price}}</h5>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary d-flex justify-content-center mt-3">Add to Cart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection