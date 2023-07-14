@extends('layout.layout_user_order')
@section('content')
    <div class="container mt-3 col d-flex flex-column overflow-y-hidden ">
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <h2 class="mb-4">Select your seats</h2>
            <div class="cinema-vis-container d-flex flex-column justify-content-center align-items-center">
                <p>Cinema Screen</p>
            </div>
            <div class="container-fluid justify-content-center mt-4">
                <div class="row gap-3">
                    <div class="col-auto">
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="seat-info seat-info-empty me-2"></div>
                            <p class="fs-6 mb-0">Seats can be reserved</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="seat-info seat-info-selected me-2"></div>
                            <p class="fs-6 mb-0">Successful seats to be selected</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex flex-wrap justify-content-center">
                            <div class="seat-info seat-info-booked me-2"></div>
                            <p class="fs-6 mb-0">Seats are reserved</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="seat-map" class="mt-5 mb-2 d-flex justify-content-center ">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            @for ($i = 0; $i < count($movie->tickets); $i += 10)
                                <tr>
                                    @foreach ($movie->tickets->slice($i, 10) as $ticket)
                                        <td>
                                            <div class="seat{{ $ticket->status === 'booked' ? ' booked' : '' }}"
                                                id="seat-{{ $ticket->id_seat }}" value="{{ $ticket->id_seat }}">
                                                {{ $ticket->seat->number }}
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <form action="{{ route('process.order', ['id' => $movie->id]) }}" method="post"
                class="form d-flex flex-column align-items-start gap-3 mb-5">
                @csrf
                <div class="container">
                    <div class="row my-3">
                        <input type="hidden" id="array" name="arraySeatMovie" class="form-control col-auto"
                            placeholder="List of Selected Seat" readonly>
                    </div>
                    <div class="row my-3">
                        <label for="quantity" class=" me-3 col-auto">Quantity of selected seat :</label>
                        <input type="number" id="quantity" name="quantity" class="form-control col-auto "
                            placeholder="Quantity of selected seat" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 shadow-on-hover-dark" id="submit">Order</button>
                </div>
            </form>
        </div>
    </div>
@endsection
