@extends('layouts.app')

@section('title', 'Checkout - Fashion Store')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Checkout</h1>

    <div class="row">
        <!-- Checkout Form -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">Shipping Information</h5>
                    <form>
                        <div class="row g-3">
                            <!-- Contact Information -->
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-control" required>
                            </div>

                            <!-- Address -->
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address 2 (Optional)</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">State</label>
                                <select class="form-select" required>
                                    <option value="">Choose...</option>
                                    <option>California</option>
                                    <option>New York</option>
                                    <option>Texas</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">ZIP Code</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">Payment Method</h5>
                    <div class="mb-3">
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="credit" checked>
                            <label class="form-check-label" for="credit">
                                Credit Card
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="debit">
                            <label class="form-check-label" for="debit">
                                Debit Card
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paypal">
                            <label class="form-check-label" for="paypal">
                                PayPal
                            </label>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Name on Card</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Card Number</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Expiration</label>
                            <input type="text" class="form-control" placeholder="MM/YY" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">CVV</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Order Summary</h5>
                    
                    <!-- Order Items -->
                    <div class="mb-4">
                        @for ($i = 1; $i <= 3; $i++)
                        <div class="d-flex justify-content-between mb-2">
                            <span>Product {{ $i }} (1x)</span>
                            <span>$99.99</span>
                        </div>
                        @endfor
                    </div>

                    <hr>
                    
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

                    <!-- Place Order Button -->
                    <button type="submit" class="btn btn-primary w-100">
                        Place Order
                    </button>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            By placing your order, you agree to our
                            <a href="#">Terms of Service</a> and
                            <a href="#">Privacy Policy</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
