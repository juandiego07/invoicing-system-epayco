@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="fst-italic">Facturas pendientes por pago</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Moneda</th>
                            <th scope="col">Total</th>
                            <th scope="col">Fecha vencimiento</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $item)
                            <form class="formDelete" action={{ url('/bill/' . $item->id) }}>
                                @method('GET')
                                @csrf
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->name }} {{ $item->last_name }}</td>
                                    <td class="text-uppercase">{{ $item->currency }}</td>
                                    <td>$ {{ $item->amount }}</td>
                                    <td>{{ $item->expiration_date }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            </form>
                        @endforeach
                        {{-- @foreach ($bills as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->name }} {{ $item->last_name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->expiration_date }}</td>
                                <td>{{ $item->status }}</td>
                                <td><a class="delete" href={{ url('/bill/' . $item->id) }}>
                                        <i class="btn btn-danger bi bi-x-circle-fill"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
