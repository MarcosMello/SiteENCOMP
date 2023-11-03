@extends('layouts.app', ['activePage' => 'coffeeBreak-management', 'titlePage' => __('Coffee Breaks')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a class="float-right" href="{{ route('coffeeBreak.create') }}">
                                <button type="button" title="{{ __('Add Coffee Break') }}" class="btn btn-primary add-button">
                                    <i class="material-icons">add_circle_outline</i>{{ __('Add Coffee Break') }}
                                </button>
                            </a>
                            <h4 class="card-title ">{{ __('Coffee Breaks') }}</h4>
                            <p class="card-category">{{ __('List of all Coffee Breaks') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            {{ __('Name') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($coffeeBreaks as $coffeeBreak)
                                        <tr>
                                            <td>{{ $coffeeBreak->id }}</td>
                                            <td>{{ $coffeeBreak->name }}</td>
                                            <td>
                                                <!-- Edit button -->
                                                <a href="{{ route('coffeeBreak.edit', $coffeeBreak->id) }}">
                                                    <button type="button" title="{{ __('Edit') }}"
                                                            class="btn btn-warning">
                                                        <i class="material-icons" style="color: white">edit</i>
                                                    </button>
                                                </a>
                                                <!-- Delete Button -->
                                                <button type="button" title="{{ __('Delete') }}"
                                                        data-toggle="modal" data-target="#delete-modal"
                                                        data-id="{{ $coffeeBreak->id }}" class="btn btn-danger">
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal excluir -->
        <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title col-12 text-dark" id="serviceModalLabel">{{__('Confirmation')}}</h5>
                    </div>
                    <div class="modal-body">{{ __('Are you sure to delete this Coffee Break?') }}</div>
                    <div class="modal-footer">
                        <form id="delete-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button type="submit" form="delete-form" class="btn btn-danger">Excluir</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fim Modal excluir -->

    </div>
@endsection

@push('js')
    <!-- Scripts Here -->
    <script>
        /* js to open delete modal */
        $('#delete-modal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);
            const id = button.data('id')
            $('#delete-form').attr('action', 'coffeeBreak/' + id)
        })
    </script>
@endpush
