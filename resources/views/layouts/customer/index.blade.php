@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

    <div class="container">
        <div class="row my-2">
            <div class="col-12 d-flex flex-row-reverse">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Nuevo Cliente
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form class="needs-validation" method="POST" action={{ route('customer.store') }} autocomplete="off" novalidate>
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fst-italic" id="staticBackdropLabel">Agregar Cliente</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-2 mb-2">
                                            <label for="document_type" class="form-label">Tipo</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="document_type" name="document_type" required>
                                                <option selected></option>
                                                <option value="NIT">NIT</option>
                                                <option value="PEP">PEP</option>
                                                <option value="CC">CC</option>
                                                <option value="CE">CE</option>
                                            </select>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label for="document_number" class="form-label">Número de Documento</label>
                                            <input type="number" class="form-control" id="document_number"
                                                name="document_number" placeholder="1234567890" required>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label for="phone_number" class="form-label">Número de Teléfono</label>
                                            <input type="number" class="form-control" id="phone_number"
                                                name="phone_number" placeholder="3001234567" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label for="name" class="form-label">Nombres</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Pepito Fulanito" required>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="last_name" class="form-label">Apellidos</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                placeholder="Perez Perez" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label for="email" class="form-label">Dirección de Correo Electrónico</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="name@example.com" required>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="address" class="form-label">Dirección</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Calle 1 # 2 - 3, Medellin, Antioquia" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-2">
        <div class="card mt-2">
            <div class="card-header">
                <h3 class="fst-italic">Clientes Registrados</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Tipo</th>
                            <th scope="col">N° Documento</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $item)
                            <tr>
                                <td>{{ $item->document_type }}</td>
                                <td>{{ $item->document_number }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td><a href={{ route('customer.edit', ['id'=>$item->id]) }}><i class="bi bi-pencil-square btn btn-primary"></i></a></td> {{-- | <i class="bi bi-x-square btn btn-danger"></i> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
