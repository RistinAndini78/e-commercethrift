@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- Judul Card -->
                    <div class="card-header text-center text-center h4" style="background-color: black; color: white">{{ __('Product Detail') }}</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div class="">
                                <!-- Gambar Produk -->
                                <img src="{{ url('storage/' . $product->image) }}" alt="" width="200px">
                            </div>
                            <div class=""> <!-- Perubahan disini -->
                                <!-- Nama Produk -->
                                <h1>{{ $product->name }}</h1>
                                <!-- Deskripsi Produk -->
                                <h6>{{ $product->description }}</h6>
                                <!-- Harga Produk -->
                                <h3>Rp{{ $product->price }}</h3>
                                <hr>
                                <!-- Stok Produk -->
                                <p>{{ $product->stock }} tersisa</p>
                                <!-- Form untuk menambahkan produk ke keranjang -->
                                @if (!Auth::user()->is_admin)
                                    <form action="{{ route('add_to_cart', $product) }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                name="amount" value=1>
                                            <div class="input-group-append">
                                                <button class="btn btn-warning" type="submit">Add to Cart</button>
                                            </div>
                                        </div>
                                    </form>
                                <!-- Form untuk mengedit produk (hanya untuk admin) -->
                                @else
                                    <form action="{{ route('edit_product', $product) }}" method="get">
                                        <button type="submit" class="btn btn-warning">Edit product</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <!-- Menampilkan pesan error jika ada -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
