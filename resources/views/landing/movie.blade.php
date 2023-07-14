@extends('layout.layout_guest_movie')
@section('content')
    <div class="main-movie-section movie-bg container-fluid px-0 row  mx-0 gap-4">
        @foreach ($movies as $movie)
            <div href="#" class="col-xl-12 col-6 col-md-10 px-0 container-fluid d-flex flex-column container-poster align-items-center justify-content-center gap-2 w-auto movie-border shadow-on-hover">
                <img class="img-fluid poster-size object-fit-fill shadow" src="{{ $movie->poster_url }}">
                <p class="text-center text-light fw-semibold mb-2 ">{{ $movie->title }}</p>
                <div class="btn bg-danger shadow-on-hover mb-2">
                    <a class=" text-decoration-none text-light"  href="{{ route('getDetailMovie',  ['id' => $movie->id]) }}">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
