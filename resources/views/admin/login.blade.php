@extends('admin.app')

@section('content')

<div style="margin-left: 30% ; margin-right: 30%; margin-top:10%"><h3>Admin Login</h3>
    <form class="row g-3" method="POST" action="{{ route('admin.check') }}">
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
        <div class="container" style="text-align: center;">
            <button type="submit" class="btn" style="color:white;font-size:20px;background-color: #344E41; width: 200px; height: 50px;">
                {{ __('Login') }}
            </button>
        </div>
    </form>
</div>
@endsection
