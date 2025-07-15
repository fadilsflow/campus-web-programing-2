<x-layout>
    <x-slot name="title">Detail Pesanan #{{ $order->id }}</x-slot>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 style="font-family: 'Orbitron', sans-serif;">Detail Pesanan #{{ $order->id }}</h1>
            <a href="{{ route('orders.index') }}" class="btn btn-outline-primary" style="border: 1px solid #e83e8c;  background-color: #e83e8c; color: #fff;">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
        @endif

        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Daftar Produk</h5>
                        @foreach($order->orderDetails as $detail)
                        <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                            <img src="{{ $detail->product->image_url ? asset('storage/' . $detail->product->image_url) : 'https://via.placeholder.com/80?text=Product' }}"
                                class="me-3 rounded" style="width: 80px; height: 80px; object-fit: cover;"
                                alt="{{ $detail->product->name }}">
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ $detail->product->name }}</h6>
                                <p class="mb-1 text-muted">
                                    {{ $detail->quantity }}x @ Rp.{{ number_format($detail->unit_price, 0, ',', '.') }}
                                </p>
                                <p class="mb-0 fw-bold">
                                    Rp.{{ number_format($detail->subtotal, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Informasi Pesanan</h5>
                        <div class="mb-3">
                            <p class="mb-1 text-muted">Status</p>
                            <span class="badge bg-{{ $order->status === 'completed' ? 'success' : ($order->status === 'cancelled' ? 'danger' : 'warning') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <p class="mb-1 text-muted">Tanggal Pesanan</p>
                            <p class="mb-0">{{ $order->order_date->format('d M Y H:i') }}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold">Rp.{{ number_format($order->total_amount, 0, ',', '.') }}</span>
                        </div>

                        @if($order->status !== 'completed' && $order->status !== 'cancelled')
                        <hr>
                        <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                                <i class="bi bi-x-circle"></i> Batalkan Pesanan
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>