@extends('layout.guest')

@section('title', ' - ' . __('Properties'))

@section('content')

    <section class="container my-4">
        <h3 class="h3-responsive">{{ __('Properties') }}</h3>

        {{ dd($properties) }}
    </section>

@endsection
