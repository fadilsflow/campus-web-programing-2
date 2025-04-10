@extends('layouts.app')

@section('title', 'Shopping Cart - Fashion Store')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Shopping Cart</h1>

    <div class="row">
        <!-- Cart Items -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <!-- Cart Item -->
                    @for ($i = 1; $i <= 3; $i++)
                    <div class="row align-items-center mb-4">
                        <div class="col-md-2">
                            <img src="https://placehold.co/150x150?text=Product+{{ $i }}" class="img-fluid rounded" alt="Product {{ $i }}">
                        </div>
                        <div class="col-md-4">
                            <h5 class="mb-1">Product {{ $i }}</h5>
                            <p class="text-muted mb-0">Size: M</p>
                            <button class="btn btn-link text-danger p-0 mt-2">
                                <i class="bi bi-trash"></i> Remove
                            </button>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group input-group-sm" style="width: 120px;">
                                <button class="btn btn-outline-secondary" type="button">-</button>
                                <input type="text" class="form-control text-center" value="1">
                                <button class="btn btn-outline-secondary" type="button">+</button>
                            </div>
                        </div>
                        <div class="col-md-3 text-end">
                            <span class="h5">$99.99</span>
                        </div>
                    </div>
                    @if ($i < 3)
                    <hr>
                    @endif
                    @endfor
                </div>
            </div>

            <!-- Continue Shopping -->
            <a href="/products" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Continue Shopping
            </a>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Order Summary</h5>
                    
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span>$299.97</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping</span>
                        <span>Free</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Tax</span>
                        <span>$30.00</span>
                    </div>
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between mb-4">
                        <span class="h5">Total</span>
                        <span class="h5">$329.97</span>
                    </div>

                    <!-- Promo Code -->
                    <div class="mb-4">
                        <label class="form-label">Promo Code</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter code">
                            <button class="btn btn-outline-primary">Apply</button>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <a href="/checkout" class="btn btn-primary w-100">
                        Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
