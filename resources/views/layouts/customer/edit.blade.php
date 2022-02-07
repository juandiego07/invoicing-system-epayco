@extends('layouts.app')

@section('title', 'Editando')

@section('content')

    <div class="container">
        <div class="card mt-5">
            <form class="needs-validation" method="POST" action={{ route('customer.update') }} novalidate>
                @csrf
                <div class="card-header">
                    <h3 class="fst-italic">Editar cliente</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name="id" value="{{ $customer->id }}">
                        <div class="col-2 mb-2">
                            <label for="document_type" class="form-label">Tipo</label>
                            <input type="document_type" class="form-control" id="document_type" name="document_type"
                                placeholder="1234567890" value="{{ $customer->document_type }}" readonly required>
                        </div>
                        <div class="col-5 mb-2">
                            <label for="document_number" class="form-label">Número de Documento</label>
                            <input type="number" class="form-control" id="document_number" name="document_number"
                                placeholder="1234567890" value="{{ $customer->document_number }}" readonly required>
                        </div>
                        <div class="col-5 mb-2">
                            <label for="phone_number" class="form-label">Número de Teléfono</label>
                            <input type="number" class="form-control" id="phone_number" name="phone_number"
                                placeholder="3001234567" value="{{ $customer->phone_number }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="name" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Pepito Fulanito"
                                value="{{ $customer->name }}" required>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="last_name" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                placeholder="Perez Perez" value="{{ $customer->last_name }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2">
                            <label for="email" class="form-label">Dirección de Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com" value="{{ $customer->email }}" required>
                        </div>
                        <div class="col-6 mb-2">
                            <label for="address" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Calle 1 # 2 - 3, Medellin, Antioquia" value="{{ $customer->address }}"
                                required>
                        </div>
                    </div>
                    <div class="text-end mt-2">
                        <button class="btn btn-secondary" type="submit">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
