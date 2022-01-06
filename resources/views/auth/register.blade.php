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
                        <form method="POST" action={{ route('register.store') }}>
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Names and Last Name</label>
                                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                                @error('name')
                                    <div id="error" class="form-text" style="color: red">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp">
                                @error('email')
                                    <div id="error" class="form-text" style="color: red">{{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            @error('password')
                                <div id="error" class="form-text" style="color: red">{{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="passwordConfirmation" class="form-label">Password Confirmation</label>
                                <input type="password" class="form-control" id="passwordConfirmation"
                                    name="passwordConfirmation">
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
