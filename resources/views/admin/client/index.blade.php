@extends('layouts.app', ['activePage' => 'client-management', 'titlePage' => __('Clients')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <a class="float-right" href="{{ route('client.create') }}">
                                <button type="button" title="{{ __('Add Client') }}" class="btn btn-primary add-button">
                                    <i class="material-icons">add_circle_outline</i>{{ __('Add Client') }}
                                </button>
                            </a>
                            <h4 class="card-title ">{{ __('Clients') }}</h4>
                            <p class="card-category">{{ __('List of all clients') }}</p>
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
                                            {{ __('CPF') }}
                                        </th>
                                        <th>
                                            {{ __('Email') }}
                                        </th>
                                        <th>
                                            {{ __('Actions') }}
                                        </th>
                                    </thead>
                                    <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <td>{{ $client->id }}</td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->cpf }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>
                                                <!-- Show button -->
                                                <button type="button" title="{{ __('Details') }}"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#modal-detalhes" data-id="{{ $client->id }}">
                                                    <i class="material-icons">info</i>
                                                </button>
                                                <!-- Edit button -->
                                                <a href="{{ route('client.edit', $client->id) }}">
                                                    <button type="button" title="{{ __('Edit') }}"
                                                            class="btn btn-warning">
                                                        <i class="material-icons" style="color: white">edit</i>
                                                    </button>
                                                </a>
                                                <!-- Delete Button -->
                                                <button type="button" title="{{ __('Delete') }}"
                                                        data-toggle="modal" data-target="#delete-modal"
                                                        data-id="{{ $client->id }}" class="btn btn-danger">
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

        <!-- Modal Detalhes -->
        <div id="modal-detalhes" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detalhes do Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="detalhes-name" class="col-form-label">Nome</label><br>
                                    <input type="text" id="detalhes-name" name="detalhes-name" class="form-control" readonly/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="detalhes-email" class="col-form-label">Email</label><br>
                                    <input type="text" id="detalhes-email" name="detalhes-email" class="form-control"readonly/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="detalhes-cpf" class="col-form-label">CPF</label><br>
                                    <input type="text" id="detalhes-cpf" name="detalhes-cpf" class="form-control" readonly/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="detalhes-phone" class="col-form-label">Phone</label><br>
                                    <input type="text" id="detalhes-phone" name="detalhes-phone" class="form-control" readonly/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="detalhes-street" class="col-form-label">Rua</label><br>
                                    <input type="text" id="detalhes-street" name="detalhes-street" class="form-control" readonly/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="detalhes-district" class="col-form-label">Bairro</label><br>
                                    <input type="text" id="detalhes-district" name="detalhes-district" class="form-control" readonly/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="detalhes-city" class="col-form-label">Cidade</label><br>
                                    <input type="text" id="detalhes-city" name="detalhes-city" class="form-control" readonly/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="detalhes-state" class="col-form-label">Estado</label><br>
                                    <input type="text" id="detalhes-state" name="detalhes-state" class="form-control" readonly/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="detalhes-country" class="col-form-label">Pais</label><br>
                                    <input type="text" id="detalhes-country" name="detalhes-country" class="form-control" readonly/>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="detalhes-zip_code" class="col-form-label">Código Postal</label><br>
                                    <input type="text" id="detalhes-zip_code" name="detalhes-zip_code" class="form-control" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
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
                    <div class="modal-body">{{ __('Are you sure to delete this client?') }}</div>
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
        /* js para abrir Modal de Detalhes de forma dinâmica com as informações desejadas */
        $('#modal-detalhes').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            let modal = $(this)
            const id = button.data('id')
            const url = 'client/' + id
            $.getJSON(url, (resposta) => {
                $("#detalhes-name").val(resposta.name);
                $("#detalhes-email").val(resposta.email);
                $("#detalhes-cpf").val(resposta.cpf);
                $("#detalhes-phone").val(resposta.phone);
                $("#detalhes-street").val(resposta.address.street);
                $("#detalhes-district").val(resposta.address.district);
                $("#detalhes-city").val(resposta.address.city);
                $("#detalhes-state").val(resposta.address.state);
                $("#detalhes-country").val(resposta.address.country);
                $("#detalhes-zip_code").val(resposta.address.zip_code);
            });
        })

        /* js to open delete modal */
        $('#delete-modal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);
            const id = button.data('id')
            $('#delete-form').attr('action', 'client/' + id)
        })
    </script>
@endpush
