@extends('layout.layout_guest_detail_movie')
@section('content')
    <div class="container col-xl-2 col-lg-3 col-12 col-sm-4 d-flex flex-column justify-content-center align-items-center">
        <img class="img-fluid poster-size object-fit-cover shadow" src="{{ $detail_movie->poster_url }}">
        <p class="text-white text-center my-2">{{ $detail_movie->title }}</p>
    </div>
    <div class="container col-xl-8 col-lg-6 col-sm-7 col-12 ">
        <p class="text-light"><span class="fw-bold">Title</span> : {{ $detail_movie->title }}</p>
        <p class="text-light"><span class="fw-bold">Description</span>:<br> {{ $detail_movie->description }}</p>
        <p class="text-light"><span class="fw-bold">Release_date</span>: {{ $detail_movie->release_date }}</p>
        <p class="text-light"><span class="fw-bold">Age_rating</span>: {{ $detail_movie->age_rating }}</p>
        <p class="text-light"><span class="fw-bold">Ticket_price</span>: {{ $detail_movie->ticket_price }}</p>
        <h4 class="text-danger mt-4">Please Login First To Book a Ticket</h4>
        <a class="btn btn-danger shadow-on-hover w-25" href="{{ route('getLogin') }}" role="button">Login</a>
    </div>
@endsection
