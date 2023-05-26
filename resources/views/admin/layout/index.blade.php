<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!---- Website Information ---->
    <title>ENFTX - NFT Dashboard HTML Template</title>
    <meta name="description"
        content="ENFTX is the complete UX & UI dashboard for NFT. Here included bids, collection, wallet, and all user setting pages including profile, application, activity, payment method, api, sign in & sign up etc.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="{{asset('enftx-html.vercel.app/css/style.css')}}">
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
                        <div class="brand-logo"><a class="mini-logo" href="/layout/index"><img src="images/logoi.png" alt="" width="40"></a>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="dark-light-toggle theme-switch" onclick="themeToggle()">
                            <span class="dark"><i class="ri-moon-line"></i></span>
                            <span class="light"><i class="ri-sun-line"></i></span>
                        </div>
                        <div class="dropdown profile_log dropdown">
                            <div data-bs-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">
                                <div class="user icon-menu active"><span><img src="{{asset('enftx-html.vercel.app')}}/images/avatar/9.jpg" alt=""></span>
                                </div>
                            </div>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <div class="user-email">
                                    <div class="user">
                                        <span class="thumb">
                                            <img src="{{asset('enftx-html.vercel.app')}}/images/profile/3.png" alt="">
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
                                <a class="dropdown-item logout" href="signin.html">
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
    <div class="brand-logo"><a class="full-logo" href="index.html"><img src="{{asset('enftx-html.vercel.app')}}/images/logoi.png" alt="" width="30"></a></div>
    <div class="menu">
        <ul>
            <li>
                <a href="/dashboard">
                    <span><i class="ri-layout-grid-fill"></i></span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="/kategori">
                    <span><i class="ri-briefcase-line"></i></span>
                    <span class="nav-text">Kategori</span></a>
            </li>
            <li class="">
                <a href="/produk">
                    <span><i class="ri-heart-line"></i></span>
                    <span class="nav-text">Produk</span></a>
            </li>
            <li class="">
                <a href="collection.html">
                    <span><i class="ri-star-line"></i></span>
                    <span class="nav-text">Collection</span></a>
            </li>
            <li class="">
                <a href="wallet.html">
                    <span><i class="ri-wallet-line"></i></span>
                    <span class="nav-text">Wallet</span></a>
            </li>
            <li class="">
                <a href="profile.html">
                    <span><i class="ri-account-box-line"></i></span>
                    <span class="nav-text">Profile</span></a>
            </li>
            <li class="">
                <a href="settings-profile.html">
                    <span><i class="ri-settings-3-line"></i></span>
                    <span class="nav-text">Settings</span></a>
            </li>
            <li class="">
                <a href="{{ route('logout') }}">
                    <span><i class="ri-logout-circle-line"></i></span>
                    <span class="nav-text">Signout</span></a>
            </li>
        </ul>
    </div>
</div>
@yield('content')
@include('sweetalert::alert')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('enftx-html.vercel.app')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/vendor/chartjs/chart.bundle.min.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/js/plugins/chartjs-line-init.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/js/plugins/chartjs-donut.js"></script>
<script src="{{asset('enftx-html.vercel.app')}}/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    
        function hapuskategori(id){
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
                    window.location.href = "/kategori/" + id
                }
                })


        }
</script>

<script type="text/javascript">
    
    function hapusproduk(id){
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
                window.location.href = "/produk/" + id
            }
            })


    }
</script>

<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
</body>
</html>