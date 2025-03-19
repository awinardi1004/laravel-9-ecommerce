<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Order</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Orders Details') }}</div>
                @php
                    $total_price = 0;
                @endphp

                <div class="card-body">
                    <h5>Order ID {{ $order->id }}</h5>
                    <h6>By {{ $order->user->name }}</h6>

                    @if ($order->is_paid == true)
                        <p class="card-text">Paid</p>
                    @else
                        <p class="card-text">Unpaid</p>
                    @endif
                    <hr>
                    @foreach ($order->transactions as $transaction)
                        <p>{{ $transaction->product->name }} - {{ $transaction->amount }}</p>
                        @php
                            $total_price += $transaction->product->price * $transaction->amount;
                        @endphp
                    @endforeach
                    <hr>
                    <p>Total: Rp.{{ $total_price }}</p>
                    <hr>

                    @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                        <form action="{{ route('submit_payment_receipt', $order) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="payment_receipt">Upload your payment receipt</label>
                                <input type="file" name="payment_receipt" id="payment_receipt" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit Payment</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>