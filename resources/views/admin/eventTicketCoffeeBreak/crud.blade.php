@extends('layouts.app', ['activePage' => 'event_Ticket_CoffeeBreak', 'titlePage' => __('Coffee Breaks')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form id="form-member" method="POST" class="form-horizontal"
                          action="{{ isset($event_Ticket_CoffeeBreak) ? route('eventTicketCoffeeBreak.update', $event_Ticket_CoffeeBreak->id) : route('eventTicketCoffeeBreak.store') }}"
                          enctype="multipart/form-data">

                        @csrf
                        @isset($event_Ticket_CoffeeBreak)
                            @method("PUT")
                        @else
                            @method("POST")
                        @endisset

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ isset($event_Ticket_CoffeeBreak) ? __('Edit Connection') : __('Create Connection') }}</h4>
                                <p class="card-category">{{ __('Connection information') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @component('admin.eventTicketCoffeeBreak.form', ['event_Ticket_CoffeeBreak' => isset($event_Ticket_CoffeeBreak) ? $event_Ticket_CoffeeBreak : null, 'coffeeBreaks' => $coffeeBreaks, 'events' => $events])
                                @endcomponent
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                                <a href="{{ route('eventTicketCoffeeBreak.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
@endsection

@push('js')
    <script>
        function changeEventFields(eventSelector){
            let eventID = eventSelector.options[eventSelector.selectedIndex].getAttribute("data-eventid");
            let eventName = eventSelector.options[eventSelector.selectedIndex].getAttribute("data-eventname");

            document.getElementById("input-eventID").value = eventID;
            document.getElementById("input-event_name").value = eventName;
        }
    </script>
@endpush
