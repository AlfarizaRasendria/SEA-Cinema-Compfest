@extends('layout.layout_user')
@section('content')
    <div class="container-fluid  mt-5 d-flex flex-column justify-content-start align-items-center vh-100">
        @if (session('failed'))
            <div class="alert alert-danger text-center dismissible fade show h-auto d-flex justify-content-between"
                role="alert">
                {{ session('failed') }}
                <button type="button" class="ms-3 btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
        <div class="container mt-4 col d-flex flex-column">
            <div class="container row gap-5 d-flex justify-content-center">
                <h3 class="text-center fw-bold">Please Select One Of These Options by pressing the button</h3>
                <p class="text-center">Your Balance Now is: Rp {{ $user->balance }}</p>
                <a href="{{ route('getOrderTopup',['id'=>$order->id,'selectedSeats'=>$selectedSeats]) }}" class="col-6">
                    <div class=" btn btn-primary rounded p-4 py-3 w-100">
                        <h4 class="text-light">Top Up</h4>
                    </div>
                </a>
                <a href="{{ route('cancelOrder',['id'=>$order->id]) }}" class="col-6">
                    <div class="btn btn-danger rounded p-4 py-3 w-100">
                        <h4 class="text-light">Cancel Order</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
