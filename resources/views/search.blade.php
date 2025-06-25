@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Search Results for "{{ $query }}"</h2>
        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="{{ url('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <small class="text-muted">{{ $product->price }}</small>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('show_product', $product->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No products found.</p>
            @endforelse
        </div>
    </div>
@endsection
