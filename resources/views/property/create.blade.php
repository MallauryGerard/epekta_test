@extends('layout.guest')

@section('title', ' - ' . __('Create new property'))

@section('content')
    <section class="container py-5">
        <h2 class="h2-responsive pt-2">{{ __('Create new property') }}</h2>
        <form class="md-form" action="{{ route('property.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="md-form mb-4">
                <label for="images" class="form-label">{{ __('Images') }}</label>
                <input class="form-control" type="file" name="images[]" id="images" multiple />
                @error('images')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="md-form mb-4">
                <input id="address" placeholder="{{ __('Address') }}" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required />
                @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="md-form mb-4">
                <input type="number" placeholder="{{ __('price') }}" id="price" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required>
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            @foreach (App\Enums\LangsEnum::toValues() as $lang)
                <div class="md-form mb-4">
                    <textarea id="description_{{ $lang }}" placeholder="{{ __('Description') . ' (' . $lang . ')'}}" name="description_{{ $lang }}" class="md-textarea form-control @error(__('Description') . ' (' . $lang . ')') is-invalid @enderror" rows="2" required>{{ old('description_' . $lang) }}</textarea>
                    @error('description_' . $lang)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary btn-rounded waves-effect mt-4 float-end">
                {{ __('Send') }}
            </button>
            <div class="clearfix"></div>
        </form>
    </section>

@endsection

@section('scripts')
    <script>
        function initMap() {
            var input = document.getElementById('address');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
    </script>
    <script async src="https://maps.googleapis.com/maps/api/js?key={{ config('google.api_key') }}&libraries=places&callback=initMap"></script>
@endsection
