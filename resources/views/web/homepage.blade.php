@extends('layouts.app')

@section('title', 'Welcome to Fashion Store')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="bg-light p-5 rounded-3 mb-4">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Welcome to Fashion Store</h1>
            <p class="col-md-8 fs-4">Discover the latest trends in fashion for everyone.</p>
            <a href="/products" class="btn btn-primary btn-lg">Shop Now</a>
        </div>
    </div>

    <!-- Categories Section -->
    <h2 class="mb-4">Shop by Category</h2>
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-5 g-4 mb-4">
        @foreach($categories as $category)
        <div class="col">
            <div class="card h-100 shadow-sm hover-shadow">
                <img src="{{ $category['image'] }}" class="card-img-top" alt="{{ $category['name'] }}">
                <div class="card-body">
                    <h5 class="card-title text-capitalize">{{ $category['name'] }}</h5>
                    <p class="card-text">{{ $category['description'] }}</p>
                    <a href="/category/{{ $category['slug'] }}" class="btn btn-outline-primary w-100">Browse {{ $category['name'] }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Features Section -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
        <div class="col">
            <div class="text-center">
                <i class="bi bi-truck fs-1 text-primary"></i>
                <h4 class="mt-3">Free Shipping</h4>
                <p>On orders over $100</p>
            </div>
        </div>
        <div class="col">
            <div class="text-center">
                <i class="bi bi-shield-check fs-1 text-primary"></i>
                <h4 class="mt-3">Secure Payment</h4>
                <p>100% secure payment</p>
            </div>
        </div>
        <div class="col">
            <div class="text-center">
                <i class="bi bi-arrow-counterclockwise fs-1 text-primary"></i>
                <h4 class="mt-3">Easy Returns</h4>
                <p>30 days return policy</p>
            </div>
        </div>
    </div>
</div>
@endsection