@extends('pemberi_kerja.app')

@section('content')
<div style="margin-left: 15% ; margin-right: 15%; margin-top:5%">
    <h3>Registrasi sebagai Perusahaan</h3>
    <form class="row g-3" method="POST" action="{{ route('pemberi_kerja.create') }}">
    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @csrf
        <div class="col-md-6">
            <label for="inputUsername" class="form-label">{{ __('Nama Perusahaan') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" style="background-color: #A3B18A" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputAddress" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="background-color: #A3B18A">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputPassword" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" style="background-color: #A3B18A" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12" style="padding-bottom: 2%;">
            <label for="inputConfirmPassword" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="confirm_password" style="background-color: #A3B18A" required autocomplete="new-password">
            @error('confirm_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container" style="text-align: center;">
            <button type="submit" class="btn" style="background-color: #344E41;color:white;width: 200px;font-size:20px">
                {{ __('Register') }}
            </button>
        </div>
        <div class="container" style="text-align: center; padding-top: 2%;">
            <p>Already have an account? <a href="{{ route('pemberi_kerja.login') }}" style="color:black">Login</a>.</p>
        </div>
    </form>
</div>
@endsection
