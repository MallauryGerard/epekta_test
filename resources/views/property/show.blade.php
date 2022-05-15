@extends('layout.main')

@section('title', ' - ' . __('Properties'))

@section('content')
    <section class="container py-5">
        <div class="card my-3">
            <div class="card-header text-white bg-dark">
                <b>ID : {{ $property->id }}</b>
                @auth
                    <span class="float-end">
                        <a href="{{ route('property.edit', ['property' => $property]) }}" class="btn btn-sm btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i>&nbsp; {{ __('Edit') }}
                        </a>
                        <button class="btn btn-sm btn-danger delete" data-id="{{ $property->id }}" data-mdb-toggle="modal" data-mdb-target="#deleteModal">
                            <i class="fa-solid fa-trash-can"></i>&nbsp; {{ __('Delete') }}
                        </button>
                    </span>
                @endauth
            </div>
            <div class="card-body">
                <p class="card-text">
                    <b>{{ __('Address') }} : </b>
                    {{ $property->address }}
                    <br>
                    <b>{{ __('Description') }} : </b>
                    {{ $property->description->description }}
                    <br>
                </p>
                <p class="text-end">
                    <small class="font-italic">{{ __('Added : ') . $property->getFormattedDate() }}</small>
                </p>
            </div>
        </div>

        <div class="card my-3">
            <div class="card-header text-white bg-dark">
                <b>{{ __('Gallery') }}</b>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap">
                    @foreach($property->getMedia($property::$media_collection) as $media)
                        <img class="gallery-img m-2 shadow" src="{{ $media->getUrl() }}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Are you sure you want to delete this property?') }}</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">{{ __('Close') }}</button>
                    <form action="{{ route('property.destroy', ['property' => $property]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-primary" value="{{ __('Confirm') }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.delete').on('click', function () {
                $('#confirm-deletion').attr('data-id', $(this).attr('data-id'));
            });
            $('#confirm-deletion').on('click', function () {
                var id = $(this).attr('data-id');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '{{ route('property.destroy', ['property' => 'XXX']) }}'.replace('XXX', id),
                    type: 'DELETE',
                    success: function (data) {
                        $("#deleteModal").modal('hide');
                    }
                });
            });
        });
    </script>
@endpush
