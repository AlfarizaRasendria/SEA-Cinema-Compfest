@extends('layout.layout_user')
@section('content')
    <div class="container-fluid overflow-y-hidden">
        <div class="card mt-5 container">
            <div class="card-header text-center fw-bold bg-info bg-gradient">
                Order History
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead class="text-center">
                        @php
                            $i = 1;
                        @endphp
                        <tr>
                            <th>No.</th>
                            <th>Ticket Quantity</th>
                            <th>Total Price All Ticket</th>
                            <th>Date Order</th>
                            <th>Order Status</th>
                            <th>Detail Ticket</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->status }}</td>
                                <td><a href="{{ route('getDetailSuccessfullOrder', ['id' => $order->id]) }}" class="btn btn-primary">View Detail</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
