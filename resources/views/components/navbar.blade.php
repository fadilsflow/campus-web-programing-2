<div>
    <nav class="navbar navbar-expand-lg p-3" style="background: black;">
        <div class="container">
            <a class="navbar-brand text-white" href="/">Metal Merch</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/products">Produk</a>
                    </li>
                </ul>

                @if(auth()->guard('customer')->check())
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div class="d-flex align-items-center">
                        <x-cart-icon></x-cart-icon>
                    </div>

                    <!-- Dropdown User -->
                    <div class="dropdown">
                        <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::guard('customer')->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Dashboard</a></li>
                            <li>
                                <form method="POST" action="{{ route('customer.logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @else
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <a class="btn btn-outline-light me-2" href="{{ route('customer.login') }}">Login</a>
                    <a class="btn btn-light text-primary" href="{{ route('customer.register') }}">Register</a>
                </div>
                @endif
            </div>
        </div>
    </nav>
</div>