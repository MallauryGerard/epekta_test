@extends('layout.guest')

@section('content')

    <a href="{{ url()->previous() }}" type="button" class="btn btn-primary px-3 fixed-top-left">
        <i class="fas fa-angle-left fa-lg" aria-hidden="true"></i>
    </a>

    <section class="container p-5">
        <!--Form with header-->
        <div class="card auth">
            <div class="card-header bg-primary text-center">
                <h3 class="text-white mb-0">
                    <i class="fas fa-key"></i>
                    {{ __('Password confirmation') }}
                </h3>
            </div>
            <div class="card-body">
                <!--Body-->
                <form id="form-confirm" class="text-center" method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="form-outline mb-4">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <label class="form-label" for="password">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="text-left">
                        <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                    </div>
                    <button type="submit" class="btn btn-primary my-3">
                        {{ __('Send') }}
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
