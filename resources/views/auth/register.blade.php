@extends('layout.main')

@section('content')

    <section class="container p-5">
        <!--Form with header-->
        <div class="card auth m-auto">
            <!--Header-->
            <div class="card-header bg-primary text-center">
                <h3 class="text-white mb-0">
                    <i class="fas fa-user-plus"></i>
                    {{ __('Registration') }}
                </h3>
            </div>
            <div class="card-body">
                <!--Body-->
                <form id="form-register" class="text-center" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-outline mb-4">
                        <input id="name" type="text" placeholder="{{ __('Name') }}" class="form-control @error('username') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <input id="email" type="email" placeholder="{{ __('Email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        <b id="email-format" style="position: relative; color: #757575;top: -10px;"></b>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <input id="password-confirm" type="password" placeholder="{{ __('Confirm password') }}" class="form-control" name="password_confirmation" required>
                    </div>

                    <button type="submit" class="btn btn-primary my-3">
                        {{ __('Register') }}
                    </button>

                    <div class="form-outline mb-4">
                        {{ __('Already have an account?') }} <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </div>
                </form>
            </div>
        </div>
        <!--/Form with header-->
    </section>

@endsection

