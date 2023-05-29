@extends('kasir.index')

@section('content')
<div class="content-body">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card filter-tab m-0">
                    <div class="card-body bs-0 p-0 bg-transparent">
                        <div class="row">
                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="card items">
                                    <div class="card-body">
                                        <div class="items-img position-relative"><img src="{{asset('enftx-html.vercel.app/images/items/1.jpg')}}"
                                                class="img-fluid rounded mb-3" alt="">
                                        </div>
                                        <h4 class="card-title">Nama Produk</h4>
                                        <p></p>
                                        <div class="d-flex justify-content-between">
                                            <div class="text-start">
                                                <p class="mb-2">Stok</p>
                                                <h5 class="text-muted">100</h5>
                                            </div>
                                            <div class="text-start justify-content-center">
                                                <p class="mb-2 ">Qty</p>
                                                <input type="number">
                                            </div>
                                            <div class="text-end">
                                                <p class="mb-2">Harga</strong></p>
                                                <h5 class="text-muted">14.000</h5>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3"><a href="#"
                                                class="btn btn-primary">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="card items">
                                    <div class="card-body">
                                        <div class="items-img position-relative"><img src="{{asset('enftx-html.vercel.app/images/items/1.jpg')}}"
                                                class="img-fluid rounded mb-3" alt="">
                                        </div>
                                        <h4 class="card-title">Nama Produk</h4>
                                        <p></p>
                                        <div class="d-flex justify-content-between">
                                            <div class="text-start">
                                                <p class="mb-2">Stok</p>
                                                <h5 class="text-muted">100</h5>
                                            </div>
                                            <div class="text-start justify-content-center">
                                                <p class="mb-2 ">Qty</p>
                                                <input type="number">
                                            </div>
                                            <div class="text-end">
                                                <p class="mb-2">Harga</strong></p>
                                                <h5 class="text-muted">14.000</h5>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3"><a href="#"
                                                class="btn btn-primary">Add to cart</a></div>
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