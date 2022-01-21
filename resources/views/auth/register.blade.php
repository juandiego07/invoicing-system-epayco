@extends('layouts.app')

@section('title', 'Registro')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card my-2">
                    <h5 class="card-header fst-italic">Registro de Usuario</h5>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action={{ route('register.store') }} autocomplete="off" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre y Apellido</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                                <div class="invalid-feedback">
                                    El campo es obligatorio.
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-4">
                                    <label for="p_cust_id_client" class="form-label">ID ePayco</label>
                                    <input type="text" class="form-control" id="p_cust_id_client" name="p_cust_id_client" required>
                                    <div class="invalid-feedback">
                                        El campo es obligatorio.
                                    </div>
                                </div>
                                <div class="mb-3 col-8">
                                    <label for="p_key" class="form-label">Llave P_KEY ePayco</label>
                                    <input type="text" class="form-control" id="p_key" name="p_key" required>
                                    <div class="invalid-feedback">
                                        El campo es obligatorio.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Dirección de Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                                <div class="invalid-feedback">
                                    El campo es obligatorio.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="invalid-feedback">
                                    El campo es obligatorio.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" required>
                                <div class="invalid-feedback">
                                    El campo es obligatorio.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

@endsection
