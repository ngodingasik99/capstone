@extends('layout.index')

@section('content')
    <div class="" id="main-wrapper">
        <div class="content-body">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header flex-row">
                                <h4 class="card-title">Active Bids </h4><a class="btn btn-primary"
                                    href="create-invoice.html">Place a Bid</a>
                            </div>
                            <div class="card-body p-0 bs-0 bg-transparent">
                                <div class="bid-table">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="checkbox" id="flexCheckDefault" value=""></div>
                                                    </th>
                                                    <th>Item List</th>
                                                    <th>Open Price</th>
                                                    <th>Your Offer</th>
                                                    <th>Recent Offer</th>
                                                    <th>Time Left</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="checkbox" id="flexCheckDefault" value=""></div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center"><img
                                                                src="images/items/15.jpg" alt="" width="60"
                                                                class="me-3 rounded">
                                                            <div class="flex-grow-1">
                                                                <h6 class="mb-0">Cutes Cube Cool</h6>
                                                                <p class="mb-0">John Abraham</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0.0025 ETH</td>
                                                    <td> 0.0025 ETH</td>
                                                    <td><img src="images/avatar/1.jpg" alt="" width="40"
                                                            class="me-2 rounded-circle">0.0025 ETH</td>
                                                    <td>2 Hours 1 min 30s</td>
                                                    <td><span><i class="ri-close-line me-3"></i></span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="checkbox" id="flexCheckDefault" value=""></div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center"><img
                                                                src="images/items/16.jpg" alt="" width="60"
                                                                class="me-3 rounded">
                                                            <div class="flex-grow-1">
                                                                <h6 class="mb-0">Cutes Cube Cool</h6>
                                                                <p class="mb-0">John Abraham</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0.0025 ETH</td>
                                                    <td> 0.0025 ETH</td>
                                                    <td><img src="images/avatar/2.jpg" alt="" width="40"
                                                            class="me-2 rounded-circle">0.0025 ETH</td>
                                                    <td>2 Hours 1 min 30s</td>
                                                    <td><span><i class="ri-close-line me-3"></i></span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="checkbox" id="flexCheckDefault" value=""></div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center"><img
                                                                src="images/items/17.jpg" alt="" width="60"
                                                                class="me-3 rounded">
                                                            <div class="flex-grow-1">
                                                                <h6 class="mb-0">Cutes Cube Cool</h6>
                                                                <p class="mb-0">John Abraham</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0.0025 ETH</td>
                                                    <td> 0.0025 ETH</td>
                                                    <td><img src="images/avatar/3.jpg" alt="" width="40"
                                                            class="me-2 rounded-circle">0.0025 ETH</td>
                                                    <td>2 Hours 1 min 30s</td>
                                                    <td><span><i class="ri-close-line me-3"></i></span></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check"><input class="form-check-input"
                                                                type="checkbox" id="flexCheckDefault" value=""></div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center"><img
                                                                src="images/items/18.jpg" alt="" width="60"
                                                                class="me-3 rounded">
                                                            <div class="flex-grow-1">
                                                                <h6 class="mb-0">Cutes Cube Cool</h6>
                                                                <p class="mb-0">John Abraham</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>0.0025 ETH</td>
                                                    <td> 0.0025 ETH</td>
                                                    <td><img src="images/avatar/4.jpg" alt="" width="40"
                                                            class="me-2 rounded-circle">0.0025 ETH</td>
                                                    <td>2 Hours 1 min 30s</td>
                                                    <td><span><i class="ri-close-line me-3"></i></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
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