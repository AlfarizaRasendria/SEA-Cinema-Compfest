@extends('layout.layout_user')
@section('content')
    <!-- Tampilkan informasi user -->
    <div class="container mt-4 col d-flex flex-column">
        @if (session('orderCancelled'))
            <div class="alert alert-danger text-center dismissible fade show h-auto d-flex justify-content-between"
                role="alert">
                {{ session('orderCancelled') }}
                <button type="button" class="ms-3 btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
        @if (session('orderSuccess'))
            <div class="alert alert-danger text-center dismissible fade show h-auto d-flex justify-content-between"
                role="alert">
                {{ session('orderSuccess') }}
                <button type="button" class="ms-3 btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
        <div class="container row gap-5 d-flex justify-content-center">
            <h2 class="text-center">Dashboard</h2>
            <div class="col-auto bg-danger rounded p-4">
                <h4 class="text-light">Total Ticket Booked</h4>
                <p class="text-light text-center">{{ $totalTicketBooked }}</p>
            </div>
            <div class="col-auto bg-warning-custom rounded p-4">
                <h4 class="text-light">Balance Amount</h4>
                <p class="text-light text-center">Rp.{{ $balance }}</p>
            </div>
            <div class="col-auto bg-primary rounded p-4">
                <h4 class="text-light">Total Movie Booked</h4>
                <p class="text-light text-center">{{ $totalMovieBooked }}</p>
            </div>
        </div>
    </div>
@endsection
