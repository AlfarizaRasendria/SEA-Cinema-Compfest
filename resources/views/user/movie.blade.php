@extends('layout.layout_user_movie')
@section('content')
        @foreach ($movies as $movie)
            <div
                class="col-xl-12 col-6 col-md-10 px-0 container-fluid container-poster d-flex flex-column align-items-center justify-content-center gap-2 w-auto movie-border shadow-on-hover">
                <img class="img-fluid poster-size object-fit-fill shadow" src="{{ $movie->poster_url }}">
                <p class="text-center text-light fw-semibold mb-2">{{ $movie->title }}</p>
                <div class="btn bg-warning shadow-on-hover mb-2">
                    <a class=" text-decoration-none text-dark fw-semibold"
                        href="{{ route('UserDetailMovies', ['id' => $movie->id]) }}">Order Ticket</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
