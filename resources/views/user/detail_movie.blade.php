@extends('layout.layout_user_detail_movie')
@section('content')
    <div class="detail-movie-bg container-fluid px-lg-5 px-0  d-flex flex-column justify-content-center align-items-center gap-4  min-vh-100 overflow-y-hidden">
        @if ($errors->has('error'))
            <div class=" alert alert-danger dismissible fade show h-auto" role="alert" >
                {{ $errors->first('error') }}</>
                <button type="button" class="ms-3 btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
        <div class="row d-flex justify-content-center align-items-center gap-4">
            <div
                class="container col-xl-3 col-lg-4 col-md-5 col-10 col-sm-6 d-flex flex-column justify-content-center align-items-center">
                <img class="img-fluid poster-size object-fit-cover shadow" src="{{ $detail_movie->poster_url }}">
                <p class="text-white text-center my-2">{{ $detail_movie->title }}</p>
            </div>
            <div class="container col-xl-8 col-lg-6 col-sm-7 col-12 ">
                <h2 class="text-light">Movie Detail</h2>
                <p class="text-light"><span class="fw-bold">Title</span> : {{ $detail_movie->title }}</p>
                <p class="text-light"><span class="fw-bold">Description</span>:<br> {{ $detail_movie->description }}</p>
                <p class="text-light"><span class="fw-bold">Release_date</span>: {{ $detail_movie->release_date }}</p>
                <p class="text-light"><span class="fw-bold">Age_rating</span>: {{ $detail_movie->age_rating }}</p>
                <p class="text-light"><span class="fw-bold">Ticket_price</span>: {{ $detail_movie->ticket_price }}</p>
                <h4 class="text-danger mt-4 fw-bold">Order Here</h4>
                <a class="btn btn-warning shadow-on-hover w-auto px-3 fw-bold"
                    href="{{ route('getOrder', ['id' => $detail_movie->id]) }}" role="button">Order</a>
            </div>
        </div>
    </div>
@endsection
