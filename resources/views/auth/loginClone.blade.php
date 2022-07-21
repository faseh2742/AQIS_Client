@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{--


      <div class="col-md-12 border-bottom">
        <div class="row mb-5">
          <div class="col-md-3 offset-md-2 mt-5">
            <h2>Powerful Tagline For Your Products</h2>
            <p class="text-info">
              Supporting statement for your product's primary tagline
            </p>
            <button class="btn btn-dark">Learn More</button>
          </div>
          <div class="col-md-4 offset-md-1 pl-2 mt-4 border form-handler">
            <form method="POST" action="{{ route('login') }}" class="p-5">
                @csrf
              <div class="form-group d-flex pb-3">
                <label for="" class="pr-5">Username :</label>
                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group d-flex">
                <label for="" class="pr-5">Password :</label>
                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group d-flex justify-content-end pr-4">
                <button class="btn btn-success border-radius-2">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-12 p-5 d-flex justify-content-around">
        <div class="col-md-3 text-center">
          <div class="pt-4 pb-4">
            <span
              ><i class="far fa-solid fa-star" style="font-size: 60px"></i
            ></span>
          </div>
          <h5 class="card-title">What is Lorem Ipsum?</h5>
          <div class="card-body">
            <p class="text-info">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="pt-4 pb-4">
            <span
              ><i class="far fa-solid fa-star" style="font-size: 60px"></i
            ></span>
          </div>
          <h5 class="card-title">Why do we use it?</h5>
          <div class="card-body">
            <p class="text-info">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="pt-4 pb-4">
            <span
              ><i class="far fa-solid fa-star" style="font-size: 60px"></i
            ></span>
          </div>
          <h5 class="card-title">Where can I get some?</h5>
          <div class="card-body">
            <p class="text-info">
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-12 text-center">
        <div><h1>Our Cilents</h1></div>
        <div class="pb-4">
          <p class="text-info">Trusted by 10,000 customers worldwide</p>
        </div>
        <div class="col-md-12 ml-5 mt-5 mb-3">
          <carousel
           :responsive="{0:{items:1,nav:false,center:true},600:{items:3,nav:false}}"
            :loop="true"
            :center="true"
            :autoplay="true"
            :dot="true"
          >
            <img
              class="carousel-img w-75"
              src="https://via.placeholder.com/300x150.png/09f/fff"
              alt
            />
            <img
              class="carousel-img w-75"
              src="https://via.placeholder.com/300x150.png/09f/fff"
              alt
            />
            <img
              class="carousel-img w-75"
              src="https://via.placeholder.com/300x150.png/09f/fff"
              alt
            />
            <img
              class="carousel-img w-75"
              src="https://via.placeholder.com/300x150.png/09f/fff"
              alt
            />
            <img
              class="carousel-img w-75"
              src="https://via.placeholder.com/300x150.png/09f/fff"
              alt
            />
            <img
              class="carousel-img w-75"
              src="https://via.placeholder.com/300x150.png/09f/fff"
              alt
            />
            <img
              class="carousel-img w-75"
              src="https://via.placeholder.com/300x150.png/09f/fff"
              alt
            />
            <img
              class="carousel-img w-75"
              src="https://via.placeholder.com/300x150.png/09f/fff"
              alt
            />
          </carousel>
        </div>
      </div>
      <div class="col-md-12 border-top">
        <nav
          class="navbar navbar-expand-sm navbar-dark justify-content-around p-3"
        >
          <!-- Brand -->
          <a class="navbar-brand" href="#">facbook</a>
          <!-- Links -->
         <ul class="navbar-nav">
            <li class="nav-item p-2 pl-5">
              <a class="nav-link text-dark font-weight-bolder" href="#">Tours</a>
            </li>
            <li class="nav-item p-2 pl-5">
              <a class="nav-link text-dark font-weight-bolder" href="#"
                >Products</a
              >
            </li>
            <li class="nav-item p-2 pl-5">
              <a class="nav-link text-dark font-weight-bolder" href="#"
                >Pricing</a
              >
            </li>
            <li class="nav-item p-2 pl-5">
              <a class="nav-link text-dark font-weight-bolder" href="#"
                >Contacts</a
              >
            </li>
          </ul>
          <span href="#">Footer</span>
        </nav>
      </div> --}}



@endsection
