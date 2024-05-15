@extends('adminlte.layouts.auth')

@section('content')
<style>
    body.login-page {
        background-color: #000; /* Set the background to black */
    }
    .login-logo a {
        color: #0f0; /* Set the text color to green */
    }
    .card {
        background-color: #000; /* Set the card background to black */
        border: 1px solid #0f0; /* Set the border color to green */
    }
    .form-control {
        background-color: #222; /* Set the input background to dark */
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
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('home') }}"><b>{{ config('app.name', 'Laravel') }}</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">SIGN IN</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
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
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
                @if (Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                </p>
                @endif
                @if (Route::has('register'))
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">{{ __('Register') }}</a>
                </p>
                @endif
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
