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
                                    <div class="card-body">
                                        <input type="hidden" value="{{ $item->id }}" class="prod_id">
                                        <div class="items-img position-relative"><img src="{{asset('storage/' . $item->photo)}}" style="width:500px; height:400px;"
                                                class="img-fluid rounded mb-3" alt="">
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
                                                <input type="number" class="qty-input" min="1">
                                            </div>
                                            <div class="text-end">
                                                <p class="mb-2">Harga</strong></p>
                                                <h5 class="text-muted">{{$item->price}}</h5>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary d-flex justify-content-center mt-3 addToCartBtn">Add to Cart</button>
                                    </div>
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

<script>
    $(document).ready(function () {
        $('.addToCartBtn').click(function (e){
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                },
                success: function (response) {
                    alert(response.status);
                }
            });
        });

    });
</script>

@endsection