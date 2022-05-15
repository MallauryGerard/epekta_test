@extends('layout.main')

@section('content')

<section class="container p-5">
    <!--Form with header-->
    <div class="card auth">
        <div class="card-header bg-primary text-center">
            <h3 class="text-white mb-0">
                <i class="fas fa-key"></i>
                {{ __('New password') }}
            </h3>
        </div>
        <div class="card-body">
            <!--Body-->
            <form id="form-reset" class="text-center" method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-outline mb-4">
                    <input id="email" type="email" placeholder="{{ __('Email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    <div class="col-md-6">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-outline mb-4">
                    <input id="password" type="password" placeholder="{{ __('New password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <div class="col-md-6">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <small style="color: red;" role="alert">
                                    <strong>{{ $error }}</strong>
                                </small>
                                <br>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-outline mb-4">
                    <input id="password-confirm" type="password" placeholder="{{ __('Confirm new password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary my-3">
                    {{ __('Confirm') }}
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
