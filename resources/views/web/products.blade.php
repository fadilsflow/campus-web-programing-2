@extends('layouts.app')

@section('title', 'Our Products - Fashion Store')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Our Products</h1>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search products...">
                <button class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Filters Sidebar -->
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Filters</h5>
                    
                    <!-- Categories Filter -->
                    <div class="mb-4">
                        <h6>Categories</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="men">
                            <label class="form-check-label" for="men">Men's Clothing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="women">
                            <label class="form-check-label" for="women">Women's Clothing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="kids">
                            <label class="form-check-label" for="kids">Kids' Clothing</label>
                        </div>
                    </div>

                    <!-- Price Range Filter -->
                    <div class="mb-4">
                        <h6>Price Range</h6>
                        <input type="range" class="form-range" min="0" max="1000" id="priceRange">
                        <div class="d-flex justify-content-between">
                            <span>$0</span>
                            <span>$1000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-md-9">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Sample Products -->
                @for ($i = 1; $i <= 9; $i++)
                <div class="col">
                    <div class="card h-100">
                        <div class="position-relative">
                            <img src="https://placehold.co/300x300?text=Product+{{ $i }}" class="card-img-top" alt="Product {{ $i }}">
                            <div class="position-absolute top-0 end-0 p-2">
                                <button class="btn btn-light btn-sm rounded-circle">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Product {{ $i }}</h5>
                            <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0">$99.99</span>
                                <button class="btn btn-primary">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <!-- Pagination -->
            <nav class="mt-4" aria-label="Product pagination">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
