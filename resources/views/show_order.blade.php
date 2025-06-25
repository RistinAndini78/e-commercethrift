@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center h4" style="background-color: black; color: white">
                        {{ __('Order Detail') }}</div>
                    @php
                        $total_price = 0;
                    @endphp
                    <div class="card-body">
                        <h5 class="card-title">Order ID {{ $order->id }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By {{ $order->user->name }}</h6>
                        @if ($order->is_paid == true)
                            <p class="card-text">Paid</p>
                        @else
                            <p class="card-text">Unpaid</p>
                        @endif
                        <hr>
                        @foreach ($order->transactions as $transaction)
                            <p>{{ $transaction->product->name }} - {{ $transaction->amount }} pcs</p>
                            @php
                                $total_price += $transaction->product->price * $transaction->amount;
                            @endphp
                        @endforeach
                        <hr>
                        <p>Total Harga: Rp{{ $total_price }}</p>
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
                        <p>Besaran Diskon : {{ $disc }}</p>
                        <p>Diskon: Rp{{ $discount }}</p>
                        <p>Total Bayar : Rp{{ $total_bayar }}</p>
                        <hr>
                        @if ($order->is_paid == false && $order->payment_receipt == null && !Auth::user()->is_admin)
                            <form action="{{ route('submit_payment_receipt', $order) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="payment_method">Select Payment Method:</label>
                                    <select name="payment_method" id="payment_method" class="form-control">
                                        <option value="BRI">Bank BRI</option>
                                        <option value="BCA">Bank BCA</option>
                                        <option value="Mandiri">Bank Mandiri</option>
                                        <option value="BNI">Bank BNI</option>
                                        <option value="BTN">Bank BTN</option>
                                        <option value="CIMB Niaga">Bank CIMB Niaga</option>
                                        <option value="Danamon">Bank Danamon</option>
                                        <option value="Syariah">Bank Syariah</option>
                                        <!-- Tambahkan opsi bank lainnya sesuai dengan kebutuhan -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shipping_method">Select Shipping Method:</label>
                                    <select name="shipping_method" id="shipping_method" class="form-control">
                                        <option value="J&T">J&T Express</option>
                                        <option value="JNE">JNE</option>
                                        <option value="SiCepat">SiCepat</option>
                                        <option value="GrabEkspress">GrabEkspress</option>
                                        <option value="POS">POS Indonesia</option>
                                        <!-- Tambahkan opsi pengiriman lainnya sesuai dengan kebutuhan -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="payment_receipt">Upload your payment receipt</label>
                                    <input type="file" name="payment_receipt" id="payment_receipt" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit payment</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                templateResult: formatState,
                templateSelection: formatState
            });

            function formatState(state) {
                if (!state.id) {
                    return state.text;
                }
                var baseUrl = "https://example.com";
                var $state = $(
                    '<span><img src="' + baseUrl + '/' + state.element.getAttribute('data-thumbnail') +
                    '" class="img-flag" /> ' + state.text + '</span>'
                );
                return $state;
            }
        });
    </script>
@endsection
