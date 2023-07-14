@extends('layout.layout_guest')
@section('content')
    <div class="container-fluid auth-form px-0 d-flex justify-content-center align-items-center row mx-0 vh-100">
            <div class="container col-lg-4 col-md-8 col-10">
                <h2 class="text-center fw-bold mb-5">You Dont Have Authorization Here Please Click On Button Logout Below</h2>
                <a href="{{ route('Logout') }}" class="my-5 btn btn-danger text-light w-100">Logout</a>
            </div>
        </div>
    </div>
@endsection
