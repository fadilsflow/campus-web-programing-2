<x-layout>
    <x-slot name="title">Checkout</x-slot>

    <div class="container my-5">
        <h1 class="mb-4" style="font-family: 'Orbitron', sans-serif;">Checkout</h1>

        @if($cart && count($cart->items))
        <div class="row">
            <!-- Checkout Form -->
            <div class="col-lg-8">
                <div class="mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4" style="font-family: 'Orbitron', sans-serif;">Informasi Pengiriman</h5>
                        <form action="{{ route('checkout.store') }}" method="POST">
                            @csrf
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan (opsional)</label>
                                <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Ringkasan Pesanan</h5>

                        <!-- Cart Items Summary -->
                        @foreach($cart->items as $item)
                        <div class="d-flex justify-content-between mb-2">
                            <span>{{ $item->itemable->name }} ({{ $item->quantity }}x)</span>
                            <span>Rp.{{ number_format($item->itemable->price * $item->quantity, 0, ',', '.') }}</span>
                        </div>
                        @endforeach

                        <hr>

                        <!-- Total -->
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold">Rp.{{ number_format($cart->calculatedPriceByQuantity(), 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-info">
            Keranjang belanja Anda kosong. <a href="{{ route('products') }}" class="alert-link">Belanja sekarang</a>
        </div>
        @endif
    </div>
</x-layout>