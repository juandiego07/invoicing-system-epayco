@extends('layouts.app')

@section('title', 'Client')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-12 d-flex flex-row-reverse">
                {{-- <button class="btn btn-secondary" type="button">New Client</button> --}}
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    New Client
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="POST" action={{ route('client.store') }}>
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add Client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-2 mb-2">
                                            <label for="document_type" class="form-label">Type</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="document_type" name="document_type">
                                                <option selected></option>
                                                <option value="NIT">NIT</option>
                                                <option value="PEP">PEP</option>
                                                <option value="CC">CC</option>
                                                <option value="CE">CE</option>
                                            </select>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label for="document_number" class="form-label">Document Number</label>
                                            <input type="number" class="form-control" id="document_number"
                                                name="document_number" placeholder="1234567890">
                                        </div>
                                        <div class="col-5 mb-2">
                                            <label for="phone_number" class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" id="phone_number"
                                                name="phone_number" placeholder="3001234567">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label for="name" class="form-label">Names</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Pepito Fulanito">
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="last_name" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                placeholder="Perez Perez">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="name@example.com">
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Calle 1 # 2 - 3, Medellin, Antioquia">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
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
                <h3>Clients Registered</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Document</th>
                            <th scope="col">Names</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actinos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $item)
                            <tr>
                                <td>{{ $item->document_type }}</td>
                                <td>{{ $item->document_number }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td><i class="bi bi-pencil-square btn btn-primary"></i> | <i class="bi bi-x-square btn btn-danger"></i></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
