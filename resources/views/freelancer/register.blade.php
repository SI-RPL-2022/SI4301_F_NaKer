@extends('../app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div style="margin-left: 15% ; margin-right: 15%; margin-top:5%">
    <h3>Freelancer Register</h3>
    <form class="row g-3" method="POST" action="{{ route('register') }}">
    @csrf
        <!-- <div class="col-md-6">
            <label for="inputFirstName" class="form-label">Registrasi sebagai</label>
            <select class="form-select" aria-label="Default select example" style="background-color: #A3B18A">
                <option selected disabled>Open this select menu</option>
                <option value="1">Perusahaan</option>
                <option value="2">Pekerja</option>
                <option value="3">Admin</option>
            </select>
        </div> -->
        <div class="col-md-6">
            <label for="inputUsername" class="form-label">{{ __('First Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" style="background-color: #A3B18A" name="firstName" value="{{ old('firtsName') }}" required autocomplete="name" autofocus>

            @error('firstName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div><div class="col-md-6">
            <label for="inputUsername" class="form-label">{{ __('Last Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" style="background-color: #A3B18A" name="lastName" value="{{ old('lastName') }}" required autocomplete="name" autofocus>

            @error('lastName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
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
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" style="background-color: #A3B18A" required autocomplete="new-password">

        </div>
        <div class="container" style="text-align: center;">
            <button type="submit" class="btn" style="background-color: #344E41;color:white;width: 200px;font-size:20px">
                {{ __('Register') }}
            </button>
        </div>
        <div class="container" style="text-align: center; padding-top: 2%;">
            <p>Already have an account? <a href="login" style="color:black">Login</a>.</p>
        </div>
    </form>
</div>
@endsection
