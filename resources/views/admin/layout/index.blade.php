<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!---- Website Information ---->
    <title>Admin || K12</title>
    <meta name="description"
        content="ENFTX is the complete UX & UI dashboard for NFT. Here included bids, collection, wallet, and all user setting pages including profile, application, activity, payment method, api, sign in & sign up etc.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('enftx-html.vercel.app/images/profile/logo.jpeg')}}">
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
                        <div class="brand-logo"><a class="mini-logo" href="/layout/index"><img src="{{asset('enftx-html.vercel.app/images/profile/logo.jpeg')}}" alt="" width="40"></a>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="dark-light-toggle theme-switch" onclick="themeToggle()">
                            <span class="dark"><i class="ri-moon-line"></i></span>
                            <span class="light"><i class="ri-sun-line"></i></span>
                        </div>
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
                                                <img src="{{asset('storage/' . auth()->user()->photo)}}" alt="">
                                            @else
                                                <img src="{{asset('images/default-profil.jpg')}}" alt="">
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
    <div class="brand-logo user icon-menu active"><a class="full-logo" href="/dashboard"><img src="{{asset('enftx-html.vercel.app')}}/images/profile/logo.jpeg" alt="" width="30"></a></div>
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
                    <span><i class="bi bi-tag-fill"></i></span>
                    <span class="nav-text">Kategori</span></a>
            </li>
            <li class="">
                <a href="/produk">
                    <span><i class="bi bi-box-fill"></i></span>
                    <span class="nav-text">Produk</span></a>
            </li>
            <li class="">
                <a href="/kelolakeuangan">
                    <span><i class="bi bi-newspaper"></i></span>
                    <span class="nav-text">Keuangan</span></a>
            </li>
            <li class="">
                <a href="/pengeluaran">
                    <span><i class="bi bi-cash-coin"></i></span>
                    <span class="nav-text">Pengeluaran</span></a>
            </li>
            <li class="">
                <a href="/transaksi">
                    <span><i class="bi bi-cash"></i></span>
                    <span class="nav-text">Transaksi</span></a>
            </li>
            <li class="">
                <a href="/akun">
                    <span><i class="bi bi-person-circle"></i></span>
                    <span class="nav-text">Akun</span></a>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
<script type="text/javascript">
    
    function hapusmodal(id){
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
                window.location.href = "/kelolakeuangan/" + id
            }
            })


    }
</script>

<script type="text/javascript">
    
    function hapusakun(id){
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
                window.location.href = "/akun/" + id
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