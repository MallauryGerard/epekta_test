@extends('layout.main')

@section('title', ' - ' . __('Properties'))

@section('content')
    <section class="container py-5">
        <div class="card my-3">
            <div class="card-header text-white bg-dark">
                <b>{{ __('Properties list') }}</b>
            </div>
            <div class="card-body">
                <table id="datatable" class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>{{ __('Thumbnail') }}</th>
                        <th>{{ __('Address') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Price') }}</th>
                        <th>{{ __('Created at') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($properties as $property)
                        <tr class="datatable-row" data-id="{{ $property->id }}">
                            <td><img width="100px" src="{{ $property->getFirstMediaUrl($property::$media_collection) }}" alt=""></td>
                            <td>{{ $property->address }}</td>
                            <td>{{ App\Helpers\StringHelper::textPreview($property->descriptions->first()->description) }}</td>
                            <td>{{ $property->getFormattedPrice() }}</td>
                            <td>{{ $property->getFormattedDate() }}</td>
                            <td>
                                <a href="{{ route('property.show', ['property' => $property]) }}" class="btn btn-sm btn-info m-1">
                                    <i class="fa-solid fa-eye"></i>&nbsp; {{ __('View') }}
                                </a>
                                @auth
                                    <a href="{{ route('property.edit', ['property' => $property]) }}"class="btn btn-sm btn-primary m-1">
                                        <i class="fa-solid fa-pen-to-square"></i>&nbsp; {{ __('Edit') }}
                                    </a>
                                    <button class="btn btn-sm btn-danger delete m-1" data-id="{{ $property->id }}" data-mdb-toggle="modal" data-mdb-target="#deleteModal">
                                        <i class="fa-solid fa-trash-can"></i>&nbsp; {{ __('Delete') }}
                                    </button>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Are you sure you want to delete this property?') }}</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">{{ __('Close') }}</button>
                    <button id="confirm-deletion" type="button" class="btn btn-primary">{{ __('Confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!--  TODO clean it -->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable();
            $('.delete').on('click', function() {
                $('#confirm-deletion').attr('data-id', $(this).attr('data-id'));
            });
            $('#confirm-deletion').on('click', function() {
                var id = $(this).attr('data-id');
                $.ajax( {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url : '{{ route('property.destroy', ['property' => 'XXX']) }}'.replace('XXX', id),
                    type : 'DELETE',
                    success : function (data) {
                        $(".datatable-row[data-id='" + id + "']").addClass('d-none');
                        $("#deleteModal").modal('hide');
                    }
                });
            });
        });
    </script>
@endpush
