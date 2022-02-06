@extends('layouts.app')

@section('title', 'Facturación')

@section('content')

    <div class="container">
        <div class="row my-2">
            <div class="col-12 d-flex flex-row-reverse">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Nueva Factura
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form class="needs-validation" method="POST" action={{ route('bill.store') }} id="form"
                            autocomplete="off" novalidate>
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fst-italic" id="staticBackdropLabel">Agregar Factura</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for="customer" class="form-label">Cliente</label>
                                            <select class="form-select" aria-label="Default select example" id="customer"
                                                name="customer" required>
                                                <option selected></option>
                                                @foreach ($customers as $item)
                                                    <option value={{ $item->id }}>{{ $item->name }}
                                                        {{ $item->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5 mb-2">
                                            <label for="date" class="form-label">Fecha</label>
                                            <input type="date" class="form-control" id="date" name="date" readonly>
                                        </div>

                                        <div class="col-5 mb-2">
                                            <label for="expiration_date" class="form-label">Fecha de vencimiento</label>
                                            <input type="date" class="form-control" id="expiration_date"
                                                name="expiration_date" required>
                                        </div>

                                        <div class="col-2 mb-2">
                                            <label for="currency" class="form-label">Moneda</label>
                                            <select class="form-select" aria-label="Default select example" id="currency"
                                                name="currency">
                                                <option value="cop" selected>COP</option>
                                                <option value="usd">USD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for="description" class="form-label">Descripción</label>
                                            <textarea type="number" class="form-control" id="description"
                                                name="description" rows="4" placeholder="Description producto or services"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 mb-2">
                                            <label for="tax_base" class="form-label">Valor base</label>
                                            <input type="number" class="form-control" id="tax_base" name="tax_base"
                                                placeholder="$ 100,00 COP" required>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <label for="tax" class="form-label">Impuesto</label>
                                            <input type="number" class="form-control" id="tax" name="tax"
                                                placeholder="19% IVA" required>
                                        </div>
                                        <div class="col-4 mb-2">
                                            <label for="amount" class="form-label">Total</label>
                                            <input type="number" class="form-control" id="amount" name="amount"
                                                placeholder="$ 119,00 COP" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
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
                <h3 class="fst-italic">Facturas Registradas</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Total</th>
                            <th scope="col">Moneda</th>
                            <th scope="col">Fecha vencimiento</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $item)
                            <form id="delete" method="GET" action={{ url('/bill/' . $item->id) }}>
                                @csrf
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->name }} {{ $item->last_name }}</td>
                                    <td class="text-uppercase">{{ $item->currency }}</td>
                                    <td>$ {{ $item->amount }}</td>
                                    <td>{{ $item->expiration_date }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <button class="btn btn-danger bi bi-x-circle-fill" type="submit"></button>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
