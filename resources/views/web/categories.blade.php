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
            @foreach ($categories as $category)
                <div class="card">
                    <img src="{{ asset('' . $category->image) }}" alt="{{ $category->name }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                    </div>
                </div>
            @endforeach
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
