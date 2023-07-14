<nav id="nav" class="navbar navbar-expand-lg navbar-dark text-light bg-dark h-auto">
    <div class="container-fluid">
        <img src="{{ asset('images/Logo.png') }}" class="navbar-brand object-fit-cover" href="#">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-4">
                <li class="nav-item">
                    <a class="nav-link active p-4" aria-current="page" href="{{ route('getLanding') }}">Home</a>
                </li>
            </ul>
            <div class="d-flex mx-3 ms-auto gap-3">
                <a href="{{ route('getAllMovie') }}" class="nav-link active p-4">Movies</a>
                <a href="{{ route('getLogin') }}" class="nav-link active p-4">Login</a>
                <a href="{{ route('getRegister') }}" class="nav-link active p-4">Register</a>
            </div>
        </div>
    </div>
</nav>
