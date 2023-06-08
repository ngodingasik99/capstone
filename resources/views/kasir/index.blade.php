<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from enftx-html.vercel.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 May 2023 13:13:33 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!---- Website Information ---->
    <title>ENFTX - NFT Dashboard HTML Template</title>
    <meta name="description"
        content="ENFTX is the complete UX & UI dashboard for NFT. Here included bids, collection, wallet, and all user setting pages including profile, application, activity, payment method, api, sign in & sign up etc.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('enftx-html.vercel.app/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('enftx-html.vercel.app/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('enftx-html.vercel.app/css/responsive.css') }}">
</head>

<body class="@@dashboard">

    <div id="preloader"><i>.</i><i>.</i><i>.</i></div>

    <div id="main-wrapper">

        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12">
                        <div class="header-content">
                            <div class="header-left">
                                <div class="brand-logo"><a class="mini-logo" href="index.html"><img
                                            src="{{ asset('enftx-html.vercel.app/images/logoi.png') }}" alt=""
                                            width="40"></a></div>
                            </div>
                            <div class="header-right">
                                <!-- <div class="theme-switch"><i class="ri-sun-line"></i></div> -->

                                <div class="dark-light-toggle theme-switch" onclick="themeToggle()">
                                    <span class="dark"><i class="ri-moon-line"></i></span>
                                    <span class="light"><i class="ri-sun-line"></i></span>
                                </div>
                                <div class="nav-item dropdown notification dropdown">
                                    <div data-bs-toggle="dropdown" aria-haspopup="true" class=""
                                        aria-expanded="false">
                                        <div class="notify-bell icon-menu"><span><i
                                                    class="fa fa-shopping-cart"></i></span>
                                        </div>
                                    </div>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                        class="dropdown-menu notification-list dropdown-menu dropdown-menu-right"
                                        style="overflow:auto;width:400px;height:400px;padding:10px; solid #eee">
                                        <h4>Cart tarnsaction</h4>
                                        <div class="lists">
                                            {{-- <a class="" href="index.html#"> --}}
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
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                                <td><img src="{{ asset('enftx-html.vercel.app/images/avatar/9.jpg') }}"
                                                                        alt=""></td>
                                                                <td><input type="number" style="width:50px;"
                                                                        value=""></td>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                                <td><img src="{{ asset('enftx-html.vercel.app/images/avatar/9.jpg') }}"
                                                                        alt=""></td>
                                                                <td><input type="number" style="width:50px;"
                                                                        value=""></td>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                                <td><img src="{{ asset('enftx-html.vercel.app/images/avatar/9.jpg') }}"
                                                                        alt=""></td>
                                                                <td><input type="number" style="width:50px;"
                                                                        value=""></td>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                                <td><img src="{{ asset('enftx-html.vercel.app/images/avatar/9.jpg') }}"
                                                                        alt=""></td>
                                                                <td><input type="number" style="width:50px;"
                                                                        value=""></td>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                                <td><img src="{{ asset('enftx-html.vercel.app/images/avatar/9.jpg') }}"
                                                                        alt=""></td>
                                                                <td><input type="number" style="width:50px;"
                                                                        value=""></td>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                                <td><img src="{{ asset('enftx-html.vercel.app/images/avatar/9.jpg') }}"
                                                                        alt=""></td>
                                                                <td><input type="number" style="width:50px;"
                                                                        value=""></td>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                                <td><img src="{{ asset('enftx-html.vercel.app/images/avatar/9.jpg') }}"
                                                                        alt=""></td>
                                                                <td><input type="number" style="width:50px;"
                                                                        value=""></td>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                                <td><img src="{{ asset('enftx-html.vercel.app/images/avatar/9.jpg') }}"
                                                                        alt=""></td>
                                                                <td><input type="number" style="width:50px;"
                                                                        value=""></td>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                                <td><img src="{{ asset('enftx-html.vercel.app/images/avatar/9.jpg') }}"
                                                                        alt=""></td>
                                                                <td><input type="number" style="width:50px;"
                                                                        value=""></td>
                                                                <td>
                                                                    <div class="">Lorem ipsum dolor sit amet
                                                                        consectetur adipisicing elit.</div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <a href="#">
                                                        <p class="btn btn-primary">Checkout</p>
                                                    </a>
                                                </div>
                                            </div>
                                            {{-- </a> --}}

                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="nav-item dropdown notification dropdown">
                            <div data-bs-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                                <div class="notify-bell icon-menu"><span><i class="fa fa-shopping-cart"></i></span>
                                </div>
                            </div>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu notification-list dropdown-menu dropdown-menu-right" style="overflow:auto;height:400px;padding:10px; solid #eee">
                                <h4>Cart</h4>
                                <div class="lists">
                                        <div class="d-flex align-items-left"><img src="{{asset('enftx-html.vercel.app/images/avatar/9.jpg')}}" alt=""></span></div>
                                            <div class="d-flex justify-content-right">
                                                <span>Harga</span>
                                            </div>
                                        
                                        <hr>
                                    <a style="text:bold">Total</a>
                                    <a href="#"><h5 class="btn btn-primary">Checkout</h5></a>
                                </div>
                            </div>
                        </div> --}}
                                <div class="dropdown profile_log dropdown">
                                    <div data-bs-toggle="dropdown" aria-haspopup="true" class=""
                                        aria-expanded="false">
                                        <div class="user icon-menu active"><span><img
                                                    src="{{ asset('enftx-html.vercel.app/images/avatar/9.jpg') }}"
                                                    alt=""></span>
                                        </div>
                                    </div>
                                    <div tabindex="-1" role="menu" aria-hidden="true"
                                        class="dropdown-menu dropdown-menu-right">
                                        <div class="user-email">
                                            <div class="user">
                                                <span class="thumb">
                                                    <img src="images/profile/3.png" alt="">
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
                                        <a class="dropdown-item" href="wallet.html">
                                            <span><i class="ri-wallet-line"></i></span>Wallet
                                        </a>
                                        <a class="dropdown-item" href="settings-profile.html">
                                            <span><i class="ri-settings-3-line"></i></span>Settings
                                        </a>
                                        <a class="dropdown-item" href="settings-activity.html">
                                            <span><i class="ri-time-line"></i></span>Activity
                                        </a>
                                        <a class="dropdown-item" href="lock.html">
                                            <span><i class="ri-lock-line"></i></span>Lock
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
            <div class="brand-logo"><a class="full-logo" href="/"><img
                        src="{{ asset('enftx-html.vercel.app/images/logoi.png') }}" alt=""
                        width="30"></a></div>
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
                    <li class="logout"><a href="signin.html">
                            <span><i class="ri-logout-circle-line"></i></span>
                            <span class="nav-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @yield('content')
        {{-- <div class="content-body">
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
                                                    class="img-fluid rounded mb-3" alt=""><img
                                                    src="{{asset('enftx-html.vercel.app/images/avatar/1.jpg')}}" class="creator" width="50" alt=""></div>
                                            <h4 class="card-title">Nama Produk</h4>
                                            <p></p>
                                            <div class="d-flex justify-content-between">
                                                <div class="text-start">
                                                    <p class="mb-2">Stok</p>
                                                    <h5 class="text-muted">100</h5>
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
                                                    class="img-fluid rounded mb-3" alt=""><img
                                                    src="{{asset('enftx-html.vercel.app/images/avatar/1.jpg')}}" class="creator" width="50" alt=""></div>
                                            <h4 class="card-title">Nama Produk</h4>
                                            <p></p>
                                            <div class="d-flex justify-content-between">
                                                <div class="text-start">
                                                    <p class="mb-2">Stok</p>
                                                    <h5 class="text-muted">100</h5>
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
    </div> --}}




    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('enftx-html.vercel.app') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('enftx-html.vercel.app') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('enftx-html.vercel.app') }}/vendor/chartjs/chart.bundle.min.js"></script>
    <script src="{{ asset('enftx-html.vercel.app') }}/js/plugins/chartjs-line-init.js"></script>
    <script src="{{ asset('enftx-html.vercel.app') }}/js/plugins/chartjs-donut.js"></script>
    <script src="{{ asset('enftx-html.vercel.app') }}/js/scripts.js"></script>
    @stack('scripts')
</body>
<!-- Mirrored from enftx-html.vercel.app/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 May 2023 13:13:33 GMT -->

</html>
