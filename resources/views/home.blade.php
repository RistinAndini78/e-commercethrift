@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <style>
                        .warn-text {
                            color: #ffc107; /* Warning color (yellow) */
                        }

                        .black-text {
                            color: #000; /* Black color */
                        }
                    </style>

                    <h1 class="display-4">
                        <span class="warn-text">Welcome</span>
                        <span class="black-text"> to </span>
                        <span class="warn-text"> our </span>
                        <span class="black-text"> store! </span>
                    </h1>
                    <p class="lead">Discover various attractive products at the best prices in our store.</p>
                    <hr class="my-4">
                    <p>Explore our product collection now.</p>
                    <a class="btn btn-primary btn-lg" href="{{ route('index_product') }}" role="button">Shopping</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Product</h3>
                    <h4><a href="{{ route('index_product') }}" class="btn btn-link">See All</a></h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/1.jpeg') }}" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/2.jpeg') }}" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/3.jpeg') }}" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
