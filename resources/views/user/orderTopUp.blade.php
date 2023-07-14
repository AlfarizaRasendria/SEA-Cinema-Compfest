@extends('layout.layout_user')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center fw-bold text-light bg-danger bg-gradient">
                        Top Up Form
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('proceedOrderTopup',['id'=>$order->id,'selectedSeats'=>$selectedSeats]) }}" class="d-flex flex-column gap-4">
                            @csrf
                            <div class="form-group">
                                <label for="nominal">Nominal Top Up (Rupiah)</label>
                                <input type="number" name="nominal" id="nominal" class="form-control">
                                @if ($errors->has('nominal'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('nominal') }}
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="payment_method">Method</label>
                                <select name="method" id="payment_method" class="form-select" aria-label="Default select example">
                                    <option selected>Select Top Up Method</option>
                                    <option value="credit_card">Credit Card </option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                    <option value="e_wallet">E-Wallet</option>
                                </select>
                                @if ($errors->has('method'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('method') }}
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary w-auto px-sm-3 px-1 d-flex align-self-end justify-content-center mt-4 shadow-on-hover-dark">Top Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

