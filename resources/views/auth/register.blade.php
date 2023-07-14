@extends('layout.layout_guest_auth')
@section('content')
    <div class="container-fluid main-section px-0 d-flex justify-content-center align-items-center my-4 row mx-0">
        <div class=" container col-lg-4 col-md-8 col-10">
            <h2 class="text-center fw-bold">Register</h2>
            @if ($errors->has('Failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('Failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif

            <form action="{{ route('Register') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputusername1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputusername1"
                        aria-describedby="usernameHelp">
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div id="usernameHelp" class="form-text">Input Min 8 Karakter</div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputFullname1" class="form-label">FullName</label>
                    <input type="text" name="fullname" class="form-control" id="exampleInputFullname1">
                    @error('fullname')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputAge1" class="form-label">Age</label>
                    <input type="number" name="age" placeholder="0" class="form-control" id="exampleInputAge1">
                    @error('age')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('getLogin') }}" class="me-auto"><label class="form-check-label mb-4">Already have an
                        account
                        yet?</label></a>
                <button name="submit" type="submit" class="btn btn-primary w-100 fw-semibold">
                    Register
                </button>
            </form>
        </div>
    </div>
@endsection
