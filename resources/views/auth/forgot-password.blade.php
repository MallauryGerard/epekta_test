@extends('layout.main')

@section('content')

    @if (session('status'))
        <div class="toast show fade bg-success">
            <div class="toast-body text-white bg-success">{{ __('A reset email has been sent to this address!') }}</div>
        </div>
    @endif

    <section class="container p-5">
        <!--Form with header-->
        <div class="card auth">
            <div class="card-header bg-primary text-center">
                <h3 class="text-white mb-0">
                    <i class="fas fa-key"></i>
                    {{ __('Password recovery') }}
                </h3>
            </div>
            <div class="card-body">
                <!--Body-->
                <form id="form-email" class="text-center" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-outline mb-4">
                        <input id="email" type="email" placeholder="{{ __('Email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <div class="col-md-12">
                            @error('email')
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
                    <button type="submit" class="btn btn-primary my-3">
                        {{ __('Send') }}
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
