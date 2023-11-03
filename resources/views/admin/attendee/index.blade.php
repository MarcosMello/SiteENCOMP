@extends('layouts.app', ['activePage' => 'attendee-management', 'titlePage' => __('Attendee')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ __('Attendee') }}</h4>
                            <p class="card-category">{{ __('List of all Attendees') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead class=" text-primary">
                                        <th>
                                            UUID
                                        </th>
                                        <th>
                                            {{ __('Name') }}
                                        </th>
                                        <th>
                                            {{ __('CPF') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($attendees as $attendee)
                                        <tr>
                                            <td>{{ $attendee->id }}</td>
                                            <td>{{ $attendee->name }}</td>
                                            <td>{{ $attendee->CPF }}</td>
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
