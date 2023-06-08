@extends('kasir.index')

@section('content')
    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="card filter-tab m-0">
                        <div class="card-body bs-0 p-0 bg-transparent">
                            <div class="row">
                                @foreach ($kasir as $item)
                                    <div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <div class="card items">
                                            <div class="card-body">

                                                <div class="items-img position-relative"><img
                                                        src="{{ asset('storage/' . $item->photo) }}"
                                                        style="width:500px; height:200px;" class="img-fluid rounded mb-3"
                                                        alt="">
                                                </div>
                                                <h6 class="card-title">{{ $item->product_name }}
                                                </h6>
                                                <p></p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="text-start">
                                                        <p class="mb-2">Stok</p>
                                                        <h5 class="text-muted">{{ $item->stock }}</h5>
                                                    </div>
                                                    <div class="text-start justify-content-center">
                                                        <p class="mb-2 ">Qty</p>
                                                        <!--<input type="number"> -->
                                                    </div>
                                                    <div class="text-end">
                                                        <p class="mb-2">Harga</strong></p>
                                                        <h5 class="text-muted">{{ $item->price }}</h5>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mt-3">
                                                    <button class="btn btn-primary btn-add-cart"
                                                        data-value="{{ $item }}">
                                                        Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4" style="position: fixed; right:0;">
                    <div class="card filter-tab m-0">
                        <div class="card-body bs-0 p-0 bg-transparent">
                            <div class="row">
                                <div class="col-xxl-3 col-xl-4 col-lg-3 col-md-3 col-sm-3"
                                    style="width: 500px; height: 450px">
                                    <div class="card item">
                                        <div class="card-body">
                                            <div class="card-title"
                                                style="text-align: center; background-color:rgb(81, 80, 160); border-radius:10px; height:45px; padding:10px; margin-bottom:20px">
                                                <h5>Order Detail</h5>
                                            </div>
                                            <div>
                                                <h5>List Item</h5>
                                                <h5>Sub Total</h5>
                                                <h5>Total</h5>
                                                <button type="button" class="btn btn-primary">Bayar</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="card items"> --}}
                                    {{-- <div class="card-body"> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {

            $(".btn-add-cart").click(function(e) {
                var item = $(this).attr('data-value');

                e.preventDefault(); // this prevents the form from submitting
                $.ajax({
                    url: '/kasir/cart/store',
                    type: "post",
                    data: {
                        'product_id': 1,
                        'qty': 0
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data); // this is good
                    }
                });
            })
        })
    </script>
@endpush
