@extends('layouts.app', ['activePage' => 'attendeeCoffeeBreak-management', 'titlePage' => __("Attendees' Coffee Break")])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __("Attendees' Coffee Breaks") }}</h4>
                            <p class="card-category">{{ __("List of all Attendees' Coffee Breaks") }}</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            {{ __('UUID Attendee') }}
                                        </th>
                                        <th>
                                            {{ __('Attendee') }}
                                        </th>
                                        <th>
                                            {{ __('Event') }}
                                        </th>
                                        <th>
                                            {{ __('Available') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($attendeeCoffeeBreaks as $attendeeCoffeeBreak)
                                        <tr>
                                            <td>{{ $attendeeCoffeeBreak->id }}</td>
                                            <td>{{ $attendeeCoffeeBreak->attendee_uuid }}</td>
                                            <td>{{ $attendeeCoffeeBreak->attendee->name }}</td>
                                            <td>{{ $attendeeCoffeeBreak->event_coffeeBreak->coffeeBreak->name }}</td>
                                            <td>{{ $attendeeCoffeeBreak->is_available ? __('Yes') : __('No') }}</td>
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
    </div>
@endsection
