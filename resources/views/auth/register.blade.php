@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card mt-5">
                    <h5 class="card-header">Register User</h5>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Names and Last Name</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp">
                                {{-- <div id="name" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="passwordConfirmation" class="form-label">Password Confirmation</label>
                                <input type="password" class="form-control" id="passwordConfirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

@endsection
