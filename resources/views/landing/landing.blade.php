@extends('layout.layout_guest')
@section('content')
    <div class="main-section container-fluid px-0 ">
        @if (session('Initmessage'))
            <div class="alert alert-success text-center dismissible fade show h-auto d-flex justify-content-between" role="alert">
                {{ session('Initmessage') }}
                <button type="button" class="ms-3 btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        @endif
        <div class="container margin-section w-75">
            <h3 class="text-center fw-bold">SEA CINEMA</h3>
            <h5 class="text-center mb-5">
                Welcome to SEA Cinema, a place that provides an unforgettable movie watching experience. Enjoy an
                unforgettable movie watching experience at SEA Cinema!</h5>
            <div class="container margin-section w-75">
                @include('components.carousel')
            </div>
        </div>

        <footer class="footer d-flex align-items-center bg-dark margin-section">
            <div class="container-fluid row d-flex align-items-center px-5 gap-5">
                <img class="navbar-brand footer-logo col-xl-2 col-md-4 col-sm-6 me-4 object-fit-cover"
                    src="{{ asset('images/Logo.png') }}" alt="Icon">
                <div class="col-xl-2 col-lg-3 col-md-4 d-flex flex-column me-3" src="/icons/logo.svg" alt="">
                    <h5 class="text-light fw-bold">Contact Us</h5>
                    <p class="text-light m-0 mb-2">rasendria.alfariza18@gmail.com</p>
                    <p class="text-light m-0">alfariza.rasendria@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-4  d-flex flex-column align-self-start" src="/icons/logo.svg" alt="">
                    <h5 class="text-light fw-bold">Address</h5>
                    <p class="text-light ">Surabaya, Jln mt haryono no 999</p>
                </div>
            </div>
        </footer>
    </div>
@endsection

{{-- Nikmati fitur-fitur
        terbaik kami, seperti melihat daftar film terbaru, informasi detail tentang setiap film, dan pemesanan tiket yang
        mudah dan cepat. Tersedia juga fasilitas top up saldo praktis untuk kebebasan dalam memilih dan memesan tiket. --}}
