<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Header card -->
                <div class="card-header bg-black text-white text-center" style="font-size: 18px;">
                    {{ __('Order') }}
                </div>
                <div class="card-body m-auto">
                    @foreach ($orders as $order)
                        <div class="card mb-2" style="width: 30rem;">
                            <div class="card-body">
                                <a href="{{ route('show_order', $order) }}">
                                    <h5 class="card-title">Order ID {{ $order->id }}</h5>
                                </a>
                                <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>

                                @if ($order->is_paid == true)
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button class="btn btn-success btn-sm"><i class="fas fa-check-circle text-warning"></i> Paid</button>
                                        <form action="{{ route('nota', $order) }}" method="get">
                                            @csrf
                                            <button class="btn btn-primary" type="submit"><i class="bi bi-printer"></i> Print</button>
                                        </form>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button class="btn btn-danger btn-sm"><i class="far fa-circle"></i> Unpaid</button>
                                        @if ($order->payment_receipt)
                                            <div>
                                                <a href="{{ url('storage/' . $order->payment_receipt) }}" class="btn btn-warning">
                                                    <i class="far fa-sticky-note"></i> Show payment receipt
                                                </a>
                                            </div>
                                            @if (Auth::user()->is_admin)
                                                <form action="{{ route('confirm_payment', $order) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm" type="submit"><i class="far fa-check-circle"></i> Confirm</button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>
