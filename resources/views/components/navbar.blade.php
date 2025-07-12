<div>
    <nav class="navbar navbar-expand-lg p-3" style="background: black; font-family: 'Open Sans', sans-serif;">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Kolom kiri: Logo -->
            <div class="flex-grow-1">
                <a class="navbar-brand" href="/">
                    <img src="/logo_punk.png" alt="Metal Merch" style="max-height: 60px;">
                </a>
            </div>

            <!-- Kolom tengah: Navigasi -->
            <div class="flex-grow-1 text-center">
                <ul class="navbar-nav justify-content-center flex-row gap-5">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/products">Produk</a>
                    </li>
                </ul>
            </div>

            <!-- Kolom kanan: Login/Register -->
            <div class="flex-grow-1 d-flex justify-content-end gap-2">
                <a class="btn btn-outline-light rounded-pill px-3" href="{{ route('customer.login') }}">Login</a>
                <a class="btn btn-outline-light rounded-pill px-3" href="{{ route('customer.register') }}">Register</a>
            </div>
        </div>
    </nav>
</div>