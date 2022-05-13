@extends('layout.guest')

@section('content')
<a href="{{ route('login') }}" type="button" class="btn-md btn-primary px-3 m-4" style="position: fixed; top: 0; left: 0;">
    <i class="fas fa-angle-left fa-lg" aria-hidden="true"></i>
</a>
<a class="btn-md btn-primary px-3 m-4" href="{{ route('logout') }}" style="position: fixed; top: 0; left: 0;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-power-off"></i> <span class="clearfix d-none d-sm-inline-block">{{ __('Logout') }}</span>
</a>
<form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
    @csrf
</form>
@if (session('status') == 'verification-link-sent')
<div id="toast-container" class="md-toast-top-right" aria-live="polite" role="alert">
    <div class="md-toast md-toast-success" style="">
        <div class="md-toast-message">
            {{ __('The verification mail has been resent') }}
        </div>
    </div>
</div>
@endif

<!--Form with header-->
<div class="card login-box" style="margin: 0 auto;">
    <div class="card-body">
        <!--Header-->
        <div class="form-header bg-primary mb-4">
            <h3 class="text-white">
                <i class="fas fa-user"></i>
                {{ __('Account verification') }}
            </h3>
        </div>

        <form id="form-verify" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <p>
                {{ __('You must validate you account. An email has been sent to : ') }} <i>{{ auth()->user()->email }}</i><br>
            </p>
            <button type="submit" class="btn btn-primary mx-auto">{{ __('Resend') }}</button>
        </form>
    </div>
</div>

@endsection
