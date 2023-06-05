<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!---- Website Information ---->
    <title>Cashier trasaction</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="ENFTX is the complete UX & UI dashboard for NFT. Here included bids, collection, wallet, and all user setting pages including profile, application, activity, payment method, api, sign in & sign up etc.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('enftx-html.vercel.app/images/favicon.png')}}">
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
                        <div class="brand-logo"><a class="mini-logo" href="index.html"><img src="{{asset('enftx-html.vercel.app/images/logoi.png')}}" alt=""
                                    width="40"></a></div>
                    </div>
                    <div class="header-right">
                        <!-- <div class="theme-switch"><i class="ri-sun-line"></i></div> -->

                        <div class="dark-light-toggle theme-switch" onclick="themeToggle()">
                            <span class="dark"><i class="ri-moon-line"></i></span>
                            <span class="light"><i class="ri-sun-line"></i></span>
                        </div>
                        <div class="nav-item dropdown notification dropdown">
                            <div data-bs-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                                <div class="notify-bell icon-menu"><span><i class="fa fa-shopping-cart"></i></span>
                                </div>
                            </div>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu notification-list dropdown-menu dropdown-menu-right" style="overflow:auto;width:400px;height:400px;padding:10px; solid #eee">
                                <h4>Cart tarnsaction</h4>
                                <div class="lists">
                                    <div class="d-flex align-items-center">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">nama produk</th>
                                                    <th scope="col">foto</th>
                                                    <th scope="col">jumlah</th>
                                                    <th scope="col">harga</th>
                                                    <th scope="col">acion</th>
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
                                                                <div class="">{{ $cart->product->product_name }}</div>
                                                            </td>
                                                            <td><img src="{{asset('storage/' . $cart->product->photo)}}" width="50px" height="50px" alt=""></td>
                                                            <td><input type="number" style="width:50px;" value="{{ $cart->qty }}"></td>
                                                            <td>
                                                                <div class="">Rp. {{ number_format($cart->product->price) }}</div>
                                                            </td>
                                                            <td class="">
                                                                <a href="#" title="Delete" class="bi bi-trash"></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    
                                                </tbody>
                                            </table>
                                            <h5>TOTAL : Rp. {{ number_format($totalPrice) }}</h5>
                                        <a href="#"><p class="btn btn-primary">Checkout</p></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown profile_log dropdown">
                            <div data-bs-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                                <div class="user icon-menu active"><span><img src="{{asset('enftx-html.vercel.app/images/avatar/9.jpg')}}" alt=""></span>
                                </div>
                            </div>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <div class="user-email">
                                    <div class="user">
                                        <span class="thumb">
                                            <img src="{{asset('enftx-html.vercel.app/images/profile/3.png')}}" alt="">
                                        </span>
                                        <div class="user-info">
                                            <h5>Jannatul Maowa</h5>
                                            <span>imsaifun@gmail.com</span>
                                        </div>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="profile.html">
                                    <span><i class="ri-user-line"></i></span>Profile
                                </a>
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
    <div class="brand-logo"><a class="full-logo" href="/"><img src="{{asset('enftx-html.vercel.app/images/logoi.png')}}" alt="" width="30"></a></div>
    <div class="menu">
        <ul>
            <li>
                <a href="/kasir/transaction">
                    <span><i class="ri-layout-grid-fill"></i></span>
                    <span class="nav-text">Transaktion</span>
                </a>
            </li>
            <li class="">
                <a href="/kasir/listtansaction">
                    <span><i class="ri-briefcase-line"></i></span>
                    <span class="nav-text">List Transaction</span></a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('enftx-html.vercel.app')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/vendor/chartjs/chart.bundle.min.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/js/plugins/chartjs-line-init.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/js/plugins/chartjs-donut.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/js/scripts.js"></script>

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
                    $('.product_data').load();
                    // location.reload('qty-input');
                }
            });
        });

    });
</script>

</body>
</html>