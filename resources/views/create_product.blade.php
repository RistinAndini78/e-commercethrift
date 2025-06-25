@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center bg-black text-white">
                        <span class="text-center">{{ __('Create Product') }}</span>

                        <a href="{{ route('index_product') }}" class="btn btn-warning">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" placeholder="Description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="stock" placeholder="Stock" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .bg-black {
        background-color: #000;
    }

    .text-white {
        color: #fff;
    }
</style>
