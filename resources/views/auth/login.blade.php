@extends('layout.layout_guest_auth')
@section('content')
    <div
        class="container-fluid auth-form main-section-login  px-0 d-flex justify-content-center align-items-center row mx-0 vh-100">

        <div class="container col-lg-4 col-md-8 col-10">
            @if (session('Success'))
                <div class="alert alert-success text-center dismissible fade show h-auto d-flex justify-content-between"
                    role="alert">
                    {{ session('Success') }}
                    <button type="button" class="ms-3 btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif
            <h2 class="text-center fw-bold mb-4">Login</h2>
            @if ($errors->has('Failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('Failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif
            <form action="{{ route('Login') }}" method="POST"
                class="container  d-flex flex-column d-flex flex-column justify-content-center align-items-center">
                @csrf
                <div class="mb-3 w-100">
                    <label for="exampleInputusername1" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputusername1"
                        aria-describedby="usernameHelp">
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 w-100">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('getRegister') }}" class="me-auto"><label class="form-check-label mb-4 ">Dont have an
                        account
                        yet?</label></a>
                <button name="submit" type="submit" class="btn btn-primary w-100 fw-semibold ">
                    Login
                </button>
            </form>
        </div>
    </div>
    </div>
@endsection
