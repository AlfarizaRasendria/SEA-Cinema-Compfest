@extends('layout.layout_user_detail_order')
@section('content')
    @if (session('success'))
        <div class="alert alert-success text-center dismissible fade show h-auto d-flex justify-content-between"
            role="alert">
            {{ session('success') }}
            <button type="button" class="ms-3 btn-close" data-bs-dismiss="alert" aria-label="close"></button>
        </div>
    @endif
    <h2 class="text-center mb-4 fw-bold">Detail Order</h2>
    <div class="container row  bottom-detail-order pb-4">
        @foreach ($order->tickets as $ticket)
            <div
                class="col-xl-12 col-6 col-md-10 px-0 container-fluid container-poster d-flex flex-column align-items-start px-3 justify-content-center gap-2 w-auto ticket-border">
                <h4 class="fw-bold bg-dark w-100 text-light text-center mt-2">Ticket</h4>
                <img src="{{ $ticket->movie->poster_url }}" class="img-fluid poster-size object-fit-fill shadow"
                    alt="card-image">
                <p><span class="fw-semibold">Identity of the booker</span>: {{ $order->user->fullname }}</p>
                <p><span class="fw-semibold">Movie Title</span>: {{ $ticket->movie->title }}</p>
                <p><span class="fw-semibold">Seat number</span>: {{ $ticket->seat->number }}</p>
                <p><span class="fw-semibold">Ticket Price</span>: {{ $ticket->movie->ticket_price }}</p>
            </div>
        @endforeach
    </div>
    <div class="container d-flex justify-content-between">
        <h3 class="fw-bold">Total Cost:</h3>
        <h3 class="fw-bold">Rp. {{ $order->total }}</h3>
    </div>
@endsection
