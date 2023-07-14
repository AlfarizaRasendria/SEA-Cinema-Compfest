@extends('layout.layout_user')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                @if ($errors->has('withdrawalError'))
                    <div class="alert alert-danger">
                        {{ $errors->first('withdrawalError') }}
                    </div>
                @endif
                <div class="card w-100">
                    <div class="card-header text-center text-light fw-bold bg-danger bg-gradient">
                        Withdraw Form
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('addUserWithdrawal') }}" class="d-flex flex-column  gap-4">
                            @csrf
                            <div class="form-group">
                                <label for="nominal">Nominal Withdrawal (Rupiah)</label>
                                <input type="number" class="form-control" id="nominal" name="nominal">
                                @if ($errors->has('nominal'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('nominal') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="bank">Method</label>
                                <select name="method" id="payment_method" class="form-select"
                                    aria-label="Default select example">
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
                            <!-- Tambahkan input dan elemen form lainnya sesuai kebutuhan -->
                            <button type="submit" class="btn btn-primary w-auto px-sm-3 px-1 d-flex align-self-end justify-content-center mt-4 shadow-on-hover-dark">Withdraw</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
