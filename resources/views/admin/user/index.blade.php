@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Users')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a class="float-right" href="{{ route('user.create') }}">
                                <button type="button" title="{{ __('Add User') }}" class="btn btn-primary add-button">
                                    <i class="material-icons">add_circle_outline</i>{{ __('Add User') }}
                                </button>
                            </a>
                            <h4 class="card-title ">{{ __('Users') }}</h4>
                            <p class="card-category">{{ __('List of all users') }}</p>
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
                                        <th>
                                            {{ __('Email') }}
                                        </th>
                                        <th>
                                            {{ __('Access Level') }}
                                        </th>
                                        <th>
                                            {{ __('Actions') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->AccessLevelName }}</td>
                                            <td>
                                            @if ($user->id != 1)
                                                <!-- Edit button -->
                                                    <a href="{{ route('user.edit', $user->id) }}">
                                                        <button type="button" title="{{ __('Edit') }}"
                                                                class="btn btn-warning">
                                                            <i class="material-icons" style="color: white">edit</i>
                                                        </button>
                                                    </a>
                                                    <!-- Delete Button -->
                                                    <button type="button" title="{{ __('Delete') }}"
                                                            data-toggle="modal" data-target="#delete-modal"
                                                            data-id="{{ $user->id }}" class="btn btn-danger">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                @endif
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
                    <div class="modal-body">{{ __('Are you sure to delete this user?') }}</div>
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
            $('#delete-form').attr('action', 'user/' + id)
        })
    </script>
@endpush
