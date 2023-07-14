<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/movie/movie.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/env/env.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @include('components.sidebar_user')

            <div
                class=" container-fluid col-10 col-sm-8 col-lg-9 col-md-9 col-xl-10 offset-xl-2 offset-md-3 offset-lg-3 offset-sm-4 offset-2 pt-4 px-3 row p-4 gap-4 movie-bg">
                @yield('content')
                {{-- View Content --}}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>
