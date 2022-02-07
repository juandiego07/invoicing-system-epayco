@extends('layouts.app')

@section('title', 'Dashboard')


@section('content')
    <div class="container">
        <div class="btn-group my-3">
            <a href={{ route('home') }} class="btn btn-outline-primary active filter" aria-current="page">Todas</a>
            <a href={{ route('home.show', ['status' => 'Anulada']) }} class="btn btn-outline-primary filter">Anulada</a>
            <a href={{ route('home.show', ['status' => 'Pagada']) }} class="btn btn-outline-primary filter">Pagada</a>
            <a href={{ route('home.show', ['status' => 'Pendiente']) }}
                class="btn btn-outline-primary filter">Pendiente</a>
        </div>
        @isset($Anulada)
            <script>
                document.querySelectorAll('.filter').forEach(
                    function(item) {
                        if (item.innerText == "Anulada") {
                            return item.classList.add('active')
                        } else {
                            return item.classList.remove('active')
                        }
                    }
                )
            </script>
        @endisset
        @isset($Pagada)
            <script>
                document.querySelectorAll('.filter').forEach(
                    function(item) {
                        if (item.innerText == "Pagada") {
                            return item.classList.add('active')
                        } else {
                            return item.classList.remove('active')
                        }
                    }
                )
            </script>
        @endisset
        @isset($Pendiente)
            <script>
                document.querySelectorAll('.filter').forEach(
                    function(item) {
                        if (item.innerText == "Pendiente") {
                            return item.classList.add('active')
                        } else {
                            return item.classList.remove('active')
                        }
                    }
                )
            </script>
        @endisset
        <div class="card">
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
                            <th scope="col">Moneda</th>
                            <th scope="col">Total</th>
                            <th scope="col">Fecha vencimiento</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bills as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->name }} {{ $item->last_name }}</td>
                                <td class="text-uppercase">{{ $item->currency }}</td>
                                <td>$ {{ $item->amount }}</td>
                                <td>{{ $item->expiration_date }}</td>
                                <td class="status">{{ $item->status }}</td>
                            </tr>
                        @endforeach
                        {{-- <script>
                            var elements = document.querySelectorAll(".status");
                            elements.forEach(function(item) {
                                if(item.innerText == "Anulada") {
                                    return item.classList.add('text-danger')
                                }else if(item.innerText == "Pendiente"){
                                    return item.classList.add('text-warning')
                                }else{
                                    return item.classList.add('text-success')
                                }
                            })
                        </script> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
