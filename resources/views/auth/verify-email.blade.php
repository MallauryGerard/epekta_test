@extends('layout.main')

@section('content')

    @if (session('status') == 'verification-link-sent')
        <div class="toast show fade bg-success">
            <div class="toast-body text-white bg-success">{{ __('The verification mail has been resent') }}</div>
        </div>
    @endif

    <section class="container p-5">
        <!--Form with header-->
        <div class="card auth m-auto">
            <!--Header-->
            <div class="card-header bg-primary text-center">
                <h3 class="text-white mb-0">
                    <i class="fas fa-user"></i>
                    {{ __('Account verification') }}
                </h3>
            </div>
            <div class="card-body">
                <form id="form-verify" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <p>
                        {{ __('You must validate you account. An email has been sent to : ') }} <i>{{ auth()->user()->email }}</i><br>
                    </p>
                    <button type="submit" class="btn btn-primary mx-auto">{{ __('Resend') }}</button>
                </form>
            </div>
        </div>
    </section>

@endsection
