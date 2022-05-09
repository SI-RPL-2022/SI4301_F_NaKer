@extends('pemberi_kerja.app')

@section('content')
<div style="margin-left: 30% ; margin-right: 30%; margin-top:10%">
    <h3>Login sebagai Perusahaan</h3>
    <form class="row g-3" method="POST" action="{{ route('pemberi_kerja.check') }}">
        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        @csrf
        <div class="col-12">
            <label for="inputAddress" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" style="background-color: #A3B18A; height:75px" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputPassword" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" style="background-color: #A3B18A; height:75px" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
        <div class="col-md-6" style="text-align: right">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
        <div class="container" style="text-align: center;">
            <button type="submit" class="btn" style="color:white;font-size:20px;background-color: #344E41; width: 200px; height: 50px;">
                {{ __('Login') }}
            </button>
        </div>
        <div class="container" style="text-align: center; padding-top: 2%;">
            <p>Don't have an account? <a href="{{ route('pemberi_kerja.register') }}" style="color:black">Register</a>.</p>
        </div>
    </form>
</div>
@endsection
