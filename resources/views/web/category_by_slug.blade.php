@extends('layouts.app')

@section('title', 'Category: {{ ucfirst($slug) }} - Fashion Store')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($slug) }}</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-md-8">
            <h1>{{ ucfirst($slug) }}</h1>
            <p class="lead">Explore our {{ $slug }} collection</p>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search in {{ $slug }}...">
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
                    
                    <!-- Price Range Filter -->
                    <div class="mb-4">
                        <h6>Price Range</h6>
                        <input type="range" class="form-range" min="0" max="1000" id="priceRange">
                        <div class="d-flex justify-content-between">
                            <span>$0</span>
                            <span>$1000</span>
                        </div>
                    </div>

                    <!-- Size Filter -->
                    <div class="mb-4">
                        <h6>Size</h6>
                        <div class="btn-group-vertical w-100" role="group">
                            <input type="checkbox" class="btn-check" id="size-s">
                            <label class="btn btn-outline-dark mb-2" for="size-s">Small</label>

                            <input type="checkbox" class="btn-check" id="size-m">
                            <label class="btn btn-outline-dark mb-2" for="size-m">Medium</label>

                            <input type="checkbox" class="btn-check" id="size-l">
                            <label class="btn btn-outline-dark mb-2" for="size-l">Large</label>

                            <input type="checkbox" class="btn-check" id="size-xl">
                            <label class="btn btn-outline-dark" for="size-xl">Extra Large</label>
                        </div>
                    </div>

                    <!-- Color Filter -->
                    <div class="mb-4">
                        <h6>Color</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="color-black">
                                <label class="form-check-label" for="color-black">Black</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="color-white">
                                <label class="form-check-label" for="color-white">White</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="color-red">
                                <label class="form-check-label" for="color-red">Red</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="color-blue">
                                <label class="form-check-label" for="color-blue">Blue</label>
                            </div>
                        </div>
                    </div>

                    <!-- Sort By -->
                    <div class="mb-4">
                        <h6>Sort By</h6>
                        <select class="form-select">
                            <option>Newest First</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Most Popular</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-md-9">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @for ($i = 1; $i <= 9; $i++)
                <div class="col">
                    <div class="card h-100">
                        <div class="position-relative">
                            <img src="https://placehold.co/300x300?text={{ $slug }}+{{ $i }}" class="card-img-top" alt="Product {{ $i }}">
                            <div class="position-absolute top-0 end-0 p-2">
                                <button class="btn btn-light btn-sm rounded-circle">
                                    <i class="bi bi-heart"></i>
                                </button>
                            </div>
                            @if($i % 3 == 0)
                            <div class="position-absolute top-0 start-0 p-2">
                                <span class="badge bg-danger">Sale!</span>
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ ucfirst($slug) }} Item {{ $i }}</h5>
                            <p class="card-text text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    @if($i % 3 == 0)
                                    <span class="text-danger h5 mb-0">$79.99</span>
                                    <small class="text-muted text-decoration-line-through">$99.99</small>
                                    @else
                                    <span class="h5 mb-0">$99.99</span>
                                    @endif
                                </div>
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
