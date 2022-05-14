@extends('layout.guest')

@section('content')

    <section class="container p-5">
        <!--Form with header-->
        <div class="card auth">
            <div class="card-header bg-primary text-center">
                <h3 class="text-white mb-0">
                    <i class="fas fa-user"></i>
                    {{ __('Login') }}
                </h3>
            </div>
            <div class="card-body">
                <form id="form-login" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-outline mb-4">
                        <input id="email" type="text" placeholder="{{ __('Email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <div class="col-md-6">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <div class="col-md-6">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" checked>
                        <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary mt-4 mb-3">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <p class="text-center">
                        <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a><br>
                        {{ __('Do not have an account?') }} <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    </p>

                </form>
            </div>
        </div>
        <!--/Form with header-->
    </section>

@endsection
