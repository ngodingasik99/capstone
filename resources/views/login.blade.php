@extends('layout.auth')

@section('title', 'login')

@section('content')
    <!-- Section: Design Block -->
<div class="vh-100 background-radial-gradient overflow-hidden">
    <style>
      .background-radial-gradient {
        background-color: hsl(218, 41%, 15%);
        background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
          radial-gradient(1250px circle at 100% 100%,
            hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%);
      }

      #radius-shape-1 {
        height: 220px;
        width: 220px;
        top: -60px;
        left: -130px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
      }

      #radius-shape-2 {
        border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
        bottom: -60px;
        right: -110px;
        width: 300px;
        height: 300px;
        background: radial-gradient(#44006b, #ad1fff);
        overflow: hidden;
      }

      .bg-glass {
        background-color: hsla(0, 0%, 100%, 0.9) !important;
        backdrop-filter: saturate(200%) blur(25px);
      }
    </style>

    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
      <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
            Aplikasi Sistem Kasir <br />
            <span style="color: hsl(218, 81%, 75%)">for your business</span>
          </h1>
          <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Temporibus, expedita iusto veniam atque, magni tempora mollitia
            dolorum consequatur nulla, neque debitis eos reprehenderit quasi
            ab ipsum nisi dolorem modi. Quos?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body px-4 py-5 px-md-5">

                <form action="" method="POST">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Logo</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>
                    @if($errors->any())
                    <div class="allert allert-danger">
                        <ul>
                            @foreach($errors->all as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                    </div>

                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit" name="submit">Login</button>
                    </div>

                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                        style="color: #393f81;">Register here</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Section: Design Block -->
@endsection
