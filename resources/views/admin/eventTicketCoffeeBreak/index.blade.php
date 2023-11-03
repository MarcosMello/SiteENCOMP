@extends('layouts.app', ['activePage' => 'eventTicketCoffeeBreak-management', 'titlePage' => __('Coffee Breaks to Event Ticket')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a class="float-right" href="{{ route('eventTicketCoffeeBreak.create') }}">
                                <button type="button" title="{{ __('Add Connection') }}" class="btn btn-primary add-button">
                                    <i class="material-icons">add_circle_outline</i>{{ __('Add Connection') }}
                                </button>
                            </a>
                            <h4 class="card-title ">{{ __('Coffee Breaks to Event Ticket') }}</h4>
                            <p class="card-category">{{ __('List of all Connections') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            {{ __('Event ID') }}
                                        </th>
                                        <th>
                                            {{ __('Event Name') }}
                                        </th>
                                        <th>
                                            {{ __('Ticket Name') }}
                                        </th>
                                        <th>
                                            {{ __('Coffee Break') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($event_Ticket_CoffeeBreaks as $event_Ticket_CoffeeBreak)
                                        <tr>
                                            <td>{{ $event_Ticket_CoffeeBreak->id }}</td>
                                            <td>{{ $event_Ticket_CoffeeBreak->eventID }}</td>
                                            <td>{{ $event_Ticket_CoffeeBreak->event_name }}</td>
                                            <td>{{ $event_Ticket_CoffeeBreak->ticket_name }}</td>
                                            <td>{{ $event_Ticket_CoffeeBreak->coffeeBreak->name }}</td>
                                            <td>
                                                <!-- Edit button -->
                                                <a href="{{ route('eventTicketCoffeeBreak.edit', $event_Ticket_CoffeeBreak->id) }}">
                                                    <button type="button" title="{{ __('Edit') }}"
                                                            class="btn btn-warning">
                                                        <i class="material-icons" style="color: white">edit</i>
                                                    </button>
                                                </a>
                                                <!-- Delete Button -->
                                                <button type="button" title="{{ __('Delete') }}"
                                                        data-toggle="modal" data-target="#delete-modal"
                                                        data-id="{{ $event_Ticket_CoffeeBreak->id }}" class="btn btn-danger">
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
                    <div class="modal-body">{{ __('Are you sure to delete this Connection?') }}</div>
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
            $('#delete-form').attr('action', 'eventTicketCoffeeBreak/' + id)
        })
    </script>
@endpush
