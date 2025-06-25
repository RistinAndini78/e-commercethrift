<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <style>
        /* Gaya tambahan */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #333;
            padding: 3px;
            /* Tambahkan padding pada body */
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            height: 50%;
            margin-bottom: 20px;
            /* Tambahkan margin bottom pada card */
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .card-body {
            height: 215px;
            /* Atur tinggi sesuai kebutuhan */
            padding: 10px;
            /* Tambahkan padding pada card body */
        }

        .card-group {
            margin: 0 -15px;
            /* Tambahkan margin negatif pada card group */
        }

        .card-group .col-md-3 {
            padding: 0 15px;
            /* Tambahkan padding pada kolom */
        }

        .card-img-top {
            width: 100%;
            /* Menyesuaikan lebar gambar dengan ukuran parent */
            height: auto;
            /* Mencegah distorsi gambar */
        }

        /* Gaya untuk tombol */
        .btn-center {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            /* Atur jarak dari atas */
        }
    </style>
</head>

<body>

    <!-- Memperluas layout dari 'layouts.app' -->
    @extends('layouts.app')

    <!-- Menentukan bagian konten dari layout -->
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <!-- Header card -->
                    <div class="card-header text-black text-center" style="font-weight: bold;">
                        <h4><b>{{ __('Products') }}</b></h4>
                        <br>
                    </div>
                </div>
                <!-- Tombol untuk membuat produk baru, hanya ditampilkan jika pengguna adalah admin -->
                @if (Auth::check() && Auth::user()->is_admin)
                    <p><a href="{{ route('create_product') }}" class="btn btn-success justify-text-left">Add Product</a></p>
                @endif



                <div class="card-group m-auto">
                    <!-- Looping untuk setiap produk -->
                    @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="card mb-3">
                                <!-- Gambar produk -->
                                <img class="card-img-top" src="{{ url('storage/' . $product->image) }}"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <!-- Nama produk -->
                                    <p class="card-text text-center"><b>{{ $product->name }}</b></p>
                                    <center>
                                        <p class="card-text">Price : {{ $product->price }}</p>
                                    </center>
                                    <!-- Form untuk menampilkan detail produk -->
                                    <form action="{{ route('show_product', $product) }}" method="get" class="btn-center">
                                        <button type="submit" class="btn btn-primary">Show detail</button>
                                    </form>
                                    <!-- Tombol untuk menghapus produk, hanya ditampilkan jika pengguna adalah admin -->
                                    @if (Auth::check() && Auth::user()->is_admin)
                                        <form action="{{ route('delete_product', $product) }}" method="post"
                                            class="btn-center">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete product</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    @endsection
</body>

</html>
