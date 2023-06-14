<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!---- Website Information ---->
    <title>Cashier || K12</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="E-Cashier">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('enftx-html.vercel.app/images/profile/logo.jpeg')}}">
    <link rel="stylesheet" href="{{asset('enftx-html.vercel.app/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('enftx-html.vercel.app/css/responsive.css')}}">
</head>

<body class="@@dashboard">
    @include('sweetalert::alert')
<div id="preloader"><i>.</i><i>.</i><i>.</i></div>

<div id="main-wrapper">

    <div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="header-content">
                    <div class="header-left">
                        <div class="brand-logo"><a class="mini-logo" href="index.html"><img src="{{asset('enftx-html.vercel.app/images/profile/logo.jpeg')}}" alt=""
                                    width="40"></a></div>
                    </div>
                    <div class="header-right">
                        <!-- <div class="theme-switch"><i class="ri-sun-line"></i></div> -->

                        <div class="dark-light-toggle theme-switch" onclick="themeToggle()">
                            <span class="dark"><i class="ri-moon-line"></i></span>
                            <span class="light"><i class="ri-sun-line"></i></span>
                        </div>
                        <div class="notify-bell icon-menu"><span><i class="fa fa-shopping-cart" data-bs-toggle="modal" data-bs-target="#cart"></i></span></div>
                        
                        <div class="dropdown profile_log dropdown">
                            <div data-bs-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                                <div class="user icon-menu active">
                                    <span>
                                        @if (Storage::exists(auth()->user()->photo))
                                            <img src="{{asset('storage/' . auth()->user()->photo)}}" alt="user">
                                        @else
                                            <img src="{{asset('images/default-profil.jpg')}}" alt="user">
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <div class="user-email">
                                    <div class="user">
                                        <span class="thumb">
                                            @if (Storage::exists(auth()->user()->photo))
                                                <img src="{{asset('storage/' . auth()->user()->photo)}}" alt="user">
                                            @else
                                                <img src="{{asset('images/default-profil.jpg')}}" alt="user">
                                            @endif
                                        </span>
                                        <div class="user-info">
                                            <h5>{{auth()->user()->name}}</h5>
                                            <span>{{auth()->user()->email}}</span>
                                        </div>
                                    </div>
                                </div>
                                <a class="dropdown-item logout" href="{{ route('logout') }}">
                                    <i class="ri-logout-circle-line"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sidebar">
    <div class="brand-logo user icon-menu active"><a class="full-logo" href="/kasir/transaction"><img src="{{asset('enftx-html.vercel.app')}}/images/profile/logo.jpeg" alt="" width="30"></a></div>
    <div class="menu">
        <ul>
            <li>
                <a href="/kasir/transaction">
                    <span><i class="ri-layout-grid-fill"></i></span>
                    <span class="nav-text">Transaction</span>
                </a>
            </li>
            <li class="">
                <a href="/kasir/listtansaction">
                    <span><i class="ri-briefcase-line"></i></span>
                    <span class="nav-text">List Transaction</span></a>
            </li>
            <li>
                <a href="/kasir/pengeluaran">
                    <span><i class="bi bi-wallet2"></i></span>
                    <span class="nav-text">Pengeluaran</span>
                </a>
            </li>
            <li class="logout"><a href="{{ route('logout') }}">
                    <span><i class="ri-logout-circle-line"></i></span>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
@yield('content')
</div>
    <!-- Modal Cart-->
<div class="modal fade" id="cart" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cartLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="closingLabel">Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    <div class="modal-body">
        <div class="center">
            <div class="d-flex align-items-center">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">produk</th>
                            <th scope="col">foto</th>
                            <th scope="col">jumlah</th>
                            <th scope="col">harga</th>
                            <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($carts as $cart)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>
                                        <div>{{ $cart->product->product_name }}</div>
                                    </td>
                                    <td>
                                        @if (Storage::exists($cart->product->photo))
                                            <img src="{{asset('storage/' . $cart->product->photo)}}" alt="product" width="50px" height="50px" class="me-2 rounded-circle">    
                                        @else
                                            <img src="{{asset('images/default-food.png')}}" alt="product" width="50px" height="50px" class="me-2 rounded-circle">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-center">{{ $cart->qty }}</div>
                                    </td>
                                    <td>
                                        <div class="text-center">Rp. {{ number_format($cart->product->price) }}</div>
                                    </td>
                                    <td>
                                        <a href="/kasir/delete-cart/{{ $cart->id }}" title="Delete"><i class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <h5>TOTAL : Rp. {{ number_format($totalPrice) }}</h5>
                    <input type="text" hidden name="total" id="total" value="{{ $totalPrice }}">
                    <div class="mb-3">
                        <label for="qty" class="form-label">Pay</label>
                        <input type="number" class="form-control" id="pay" name="pay" placeholder="Pay" min="0" onkeyup="InputSub();">
                    </div>
                    <div class="mb-3">
                        <label for="changes" class="form-label">Changes</label>
                        <input type="number" class="form-control" id="changes" name="changes" placeholder="Changes" min="{{ $totalPrice }}" readonly>
                    </div>
                <a href="/kasir/checkout"><p class="btn btn-primary">Checkout</p></a>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('enftx-html.vercel.app')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/vendor/chartjs/chart.bundle.min.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/js/plugins/chartjs-line-init.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/js/plugins/chartjs-donut.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function InputSub() {
        var total =  parseInt(document.getElementById('total').value);
        var pay =  parseInt(document.getElementById('pay').value);
        var hasil = parseInt(pay) - parseInt(total);
        if (!isNaN(hasil)) {
        document.getElementById('changes').value = hasil;
        console.log(hasil)
        };
    }
</script>

<script type="text/javascript">
    
    function hapuspengeluaran(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "Confirm Delete!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                window.location.href = "/kasir/pengeluaran/" + id
            }
            })
    }
</script>

</body>
</html>