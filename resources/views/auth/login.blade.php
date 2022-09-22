@extends('layouts.auth')

@section('title', 'Login')

@section('content')

    <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="POST" action="{{route('login')}}">
        @csrf
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="">
        <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
        </svg>
        </a>
        <h1 class="h6 mb-3">{{ __('Login') }}</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">{{ __('Email address') }}</label>
            <input type="email" id="inputEmail" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">{{ __('Password')}} </label>
            <input type="password" id="inputPassword" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Stay logged in </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
        <p class="mt-5 mb-3 text-muted">© 2020</p>
  </form>

@endsection
@section('scripts')

    <script src="{{asset('asssets-admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('asssets-admin/js/popper.min.js')}}"></script>
    <script src="{{asset('asssets-admin/js/moment.min.js')}}"></script>
    <script src="{{asset('asssets-admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('asssets-admin/js/simplebar.min.js')}}"></script>
    <script src='{{asset('asssets-admin/js/daterangepicker.js')}}'></script>
    <script src='{{asset('asssets-admin/js/jquery.stickOnScroll.js')}}'></script>
    <script src="{{asset('asssets-admin/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('asssets-admin/js/config.js')}}"></script>
    <script src="{{asset('asssets-admin/js/apps.js')}}"></script>

@endsection
