@extends('layouts.app')

@section('title', 'Categories - Fashion Store')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col">
            <h1>Shop by Category</h1>
            <p class="lead">Explore our wide range of fashion categories</p>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Category Cards -->
        <div class="col">
            <div class="card h-100 text-white category-card">
                <img src="https://placehold.co/600x400?text=Men's+Fashion" class="card-img h-100" alt="Men's Fashion">
                <div class="card-img-overlay d-flex flex-column justify-content-end" style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);">
                    <h3 class="card-title">Men's Fashion</h3>
                    <p class="card-text">Discover the latest trends in men's clothing</p>
                    <a href="/category/mens" class="btn btn-light">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 text-white category-card">
                <img src="https://placehold.co/600x400?text=Women's+Fashion" class="card-img h-100" alt="Women's Fashion">
                <div class="card-img-overlay d-flex flex-column justify-content-end" style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);">
                    <h3 class="card-title">Women's Fashion</h3>
                    <p class="card-text">Explore our women's collection</p>
                    <a href="/category/womens" class="btn btn-light">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 text-white category-card">
                <img src="https://placehold.co/600x400?text=Kids+Fashion" class="card-img h-100" alt="Kids Fashion">
                <div class="card-img-overlay d-flex flex-column justify-content-end" style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);">
                    <h3 class="card-title">Kids Fashion</h3>
                    <p class="card-text">Adorable styles for your little ones</p>
                    <a href="/category/kids" class="btn btn-light">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 text-white category-card">
                <img src="https://placehold.co/600x400?text=Accessories" class="card-img h-100" alt="Accessories">
                <div class="card-img-overlay d-flex flex-column justify-content-end" style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);">
                    <h3 class="card-title">Accessories</h3>
                    <p class="card-text">Complete your look with our accessories</p>
                    <a href="/category/accessories" class="btn btn-light">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 text-white category-card">
                <img src="https://placehold.co/600x400?text=Footwear" class="card-img h-100" alt="Footwear">
                <div class="card-img-overlay d-flex flex-column justify-content-end" style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);">
                    <h3 class="card-title">Footwear</h3>
                    <p class="card-text">Step out in style with our footwear collection</p>
                    <a href="/category/footwear" class="btn btn-light">Shop Now</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 text-white category-card">
                <img src="https://placehold.co/600x400?text=New+Arrivals" class="card-img h-100" alt="New Arrivals">
                <div class="card-img-overlay d-flex flex-column justify-content-end" style="background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);">
                    <h3 class="card-title">New Arrivals</h3>
                    <p class="card-text">Check out our latest additions</p>
                    <a href="/category/new-arrivals" class="btn btn-light">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Features -->
    <div class="row mt-5">
        <div class="col-12">
            <h2 class="text-center mb-4">Why Shop by Category?</h2>
        </div>
        <div class="col-md-4 text-center mb-4">
            <div class="p-3">
                <i class="bi bi-search fs-1 text-primary mb-3"></i>
                <h4>Easy Navigation</h4>
                <p>Find exactly what you're looking for with our organized categories</p>
            </div>
        </div>
        <div class="col-md-4 text-center mb-4">
            <div class="p-3">
                <i class="bi bi-tags fs-1 text-primary mb-3"></i>
                <h4>Best Deals</h4>
                <p>Discover special offers and discounts in each category</p>
            </div>
        </div>
        <div class="col-md-4 text-center mb-4">
            <div class="p-3">
                <i class="bi bi-arrow-repeat fs-1 text-primary mb-3"></i>
                <h4>Regular Updates</h4>
                <p>New items added to each category regularly</p>
            </div>
        </div>
    </div>
</div>

<style>
.category-card {
    transition: transform 0.3s ease;
    cursor: pointer;
}

.category-card:hover {
    transform: translateY(-5px);
}

.category-card .card-img {
    object-fit: cover;
}
</style>
@endsection
