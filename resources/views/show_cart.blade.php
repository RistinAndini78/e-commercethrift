@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-black text-white text-center" style="font-size: 18px;">{{ __('Cart') }}
                    </div>
                    <div class="card-body ">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                        @php
                            $total_price = 0;
                        @endphp
                        <div class="card-group m-auto">
                            @foreach ($carts as $cart)
                                <div class="card m-3" style="width: 14rem;">
                                    <img class="card-img-top" src="{{ url('storage/' . $cart->product->image) }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cart->product->name }}</h5>
                                        <form action="{{ route('update_cart', $cart) }}" method="post">
                                            @method('patch')
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                    name="amount" value={{ $cart->amount }}>
                                                <div class="input-group-append">
                                                    <button class="btn btn-warning" type="submit">Update amount</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{ route('delete_cart', $cart) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                @php
                                    $total_price += $cart->product->price * $cart->amount;
                                @endphp
                            @endforeach
                        </div>
                        <div class="d-flex flex-column justify-content-end align-items-end">
                            @php
                                if ($total_price >= 500000) {
                                    $discount = 0.2 * $total_price;
                                    $disc = '20%';
                                } elseif ($total_price >= 200000) {
                                    $discount = 0.1 * $total_price;
                                    $disc = '10%';
                                } else {
                                    $discount = 0;
                                    $disc = '0';
                                }
                                $total_bayar = $total_price - $discount;
                            @endphp
                            <p>Total: Rp{{ $total_price }}</p>
                            <p>Besaran Discount : {{ $disc }}</p>
                            <p>Diskon : Rp{{ $discount }}</p>
                            <p>Total Bayar : Rp{{ $total_bayar }}</p>
                            <form action="{{ route('checkout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary"
                                    @if ($carts->isEmpty()) disabled @endif>Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
