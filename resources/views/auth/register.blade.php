@extends('adminlte.layouts.auth')

@section('content')
<style>
    body.register-page {
        background-color: #000; /* Set the background to black */
    }
    .register-logo a {
        color: #0f0; /* Set the text color to green */
    }
    .card {
        background-color: #000; /* Set the card background to black */
        border: 1px solid #0f0; /* Set the border color to green */
    }
    .form-control {
        color: #0f0; /* Set the input text color to green */
        border: 1px solid #0f0; /* Set the input border color to green */
    }
    .input-group-text {
        background-color: #222; /* Set the icon background to dark */
        color: #0f0; /* Set the icon color to green */
        border: 1px solid #0f0; /* Set the icon border color to green */
    }
    .btn-primary {
        background-color: #0f0; /* Set the button background to green */
        border-color: #0f0; /* Set the button border color to green */
        color: #000; /* Set the button text color to black */
    }
    .btn-primary:hover {
        background-color: #0c0; /* Darker green on hover */
        border-color: #0c0; /* Darker green border on hover */
    }
    a {
        color: #0f0; /* Set link color to green */
    }
    a:hover {
        color: #0c0; /* Darker green on hover */
    }
</style>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ route('home') }}"><b>{{ config('app.name', 'Laravel') }}</b></a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">SIGN UP</p>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Full name" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the term
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                @if (Route::has('login'))
                <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
                @endif
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection
