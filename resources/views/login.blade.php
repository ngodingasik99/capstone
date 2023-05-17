@extends('layout.auth')

@section('title', 'login')

@section('content')
    <div class="vh-100 bg-dark">
        <div class="container  h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="{{ asset('template/dist/img/logologin.jpeg') }}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{ route('do.login') }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="{{ asset('template/dist/img/Logo-fix.png') }}" style="height: 110px">
                                            <span class="h1 fw-bold mb-0">Clothes Cashier</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account
                                        </h5>

                                        <div class="form-outline mb-4">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" aria-describedby="emailHelp">
                                            @error('email')
                                                <div id="emailHelp" class="form-text">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                id="password">
                                            @error('password')
                                                <div id="passwordHelp" class="form-text">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-4 mx-auto my-5">
    <div class="card">
        <div class="card-body">
            <form action="{{ route("do.login") }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp">
                    @error('email')
                        <div id="emailHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    @error('password')
                        <div id="passwordHelp" class="form-text">{{ $message }}</div>
                    @enderror
                </div>
                <p>
                    Belum punya akun?
                    <a href="{{ route('register') }}">silakan mendaftar.</a>
                </p>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div> --}}
@endsection
