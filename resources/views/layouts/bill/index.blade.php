@extends('layouts.app')

@section('title', 'Bill')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-12 d-flex flex-row-reverse">
                {{-- <button class="btn btn-secondary" type="button">New Client</button> --}}
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    New Bill
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form method="POST" action={{ route('bill.store') }}>
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add Bill</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for="client" class="form-label">Client</label>
                                            <select class="form-select" aria-label="Default select example" id="client"
                                                name="client">
                                                <option selected></option>
                                                @foreach ($clients as $item)
                                                    <option value={{ $item->document_type }} {{ $item->document_number }} {{ $item->user_id }}>{{ $item->name }} {{ $item->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-2">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="date" name="date"
                                                value="2022-01-08" disabled>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <label for="expiration_date" class="form-label">Expiration Date</label>
                                            <input type="date" class="form-control" id="expiration_date"
                                                name="expiration_date">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea type="number" class="form-control" id="description"
                                                name="description" rows="4"
                                                placeholder="Description producto or services"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 mb-2">
                                            <label for="tax_base" class="form-label">Tax Base</label>
                                            <input type="number" class="form-control" id="tax_base" name="tax_base"
                                                placeholder="$ 100,00 COP">
                                        </div>
                                        <div class="col-4 mb-2">
                                            <label for="tax" class="form-label">Tax</label>
                                            <input type="number" class="form-control" id="tax" name="tax"
                                                placeholder="19% IVA">
                                        </div>
                                        <div class="col-4 mb-2">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="number" class="form-control" id="amount" name="amount"
                                                placeholder="$ 119,00 COP">
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
                <h3>Bills Registered</h3>
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
                        {{-- @foreach ($clients as $item)
                            <tr>
                                <td>{{ $item->document_type }}</td>
                                <td>{{ $item->document_number }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td><i class="bi bi-pencil-square btn btn-primary"></i> | <i class="bi bi-x-square btn btn-danger"></i></td>
                            </tr> 
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
