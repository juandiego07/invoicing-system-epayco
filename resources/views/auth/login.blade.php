@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card mt-5">
                    <h5 class="card-header fst-italic">Iniciar sesión</h5>
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action={{ route('login.store') }} id="form_login"
                            autocomplete="off" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Dirección de Correo Eléctronico</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp" required>
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
                            <button type="submit" class="btn btn-primary" onclick="validarForm()">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

@endsection
