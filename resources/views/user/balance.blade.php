@extends('layout.layout_user')
@section('content')
    <div class="container-fluid  mt-5 d-flex flex-column justify-content-start align-items-center vh-100">
        @if (session('topupSuccess'))
            <div class="alert alert-success text-center dismissible fade show h-auto d-flex justify-content-between" role="alert">
                {{ session('topupSuccess') }}
                <button type="button" class="ms-3 btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
        @if (session('withdrawalSuccess'))
            <div class="alert alert-success text-center dismissible fade show h-auto d-flex justify-content-between" role="alert">
                {{ session('withdrawalSuccess') }}
                <button type="button" class="ms-3 btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
        <h2 class="text-center fw-semibold">Your Balance</h2>
        <div class="container balance-cont p-5 mt-5">
            <img src="{{ asset('icons/wallet-solid.svg') }}" class="img-fluid" alt="Icon">
        </div>
        <p class="text-center mt-4">Your Balance Now is: Rp {{ $balance }}</p>
        <div class="d-flex justify-content-center mt-4 gap-4 row">
            <a href="{{ route('getUserTopUp') }}" class="btn btn-primary  col-12 col-sm-4 w-auto">Top Up</a>
            <a href="{{ route('getUserWithdrawal') }}" class="btn btn-danger col-12 col-sm-4 w-auto">Withdraw</a>
        </div>
    </div>
@endsection
