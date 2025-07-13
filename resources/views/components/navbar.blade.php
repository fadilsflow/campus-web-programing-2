<div>
    <nav class="navbar navbar-expand-lg " style="background: black; font-family: 'Open Sans', sans-serif;">
        <div class="container position-relative">
            <!-- Logo -->
            <a class="navbar-brand" href="/">
                <img src="/logo_punk.png" alt="Metal Merch" style="max-height: 60px;">
            </a>

            <!-- Hamburger Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list text-white fs-2"></i>
            </button>

            <!-- Navigation Links - Absolutely Centered -->
            <div class="position-absolute start-50 translate-middle-x d-none d-lg-block" style="z-index: 1;">
                <ul class="navbar-nav flex-row gap-5">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('categories*') ? 'active' : '' }}" href="/categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('products*') ? 'active' : '' }}" href="/products">Produk</a>
                    </li>
                </ul>
            </div>

            <!-- Mobile Navigation -->
            <div class="collapse navbar-collapse mt-3" id="navbarContent">
                <ul class="navbar-nav d-lg-none text-center mb-3">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('categories*') ? 'active' : '' }}" href="/categories">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('products*') ? 'active' : '' }}" href="/products">Produk</a>
                    </li>
                </ul>
            </div>

            <!-- User Actions -->
            @if(auth()->guard('customer')->check())
            <div class="d-flex align-items-center gap-3">
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
                        <li><a class="dropdown-item" href="{{ route('orders.index') }}">Pesanan Saya</a></li>
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
            <div class="d-flex align-items-center gap-2">
                <a class="btn btn-outline-light rounded-pill px-3" href="{{ route('customer.login') }}">Login</a>
                <a class="btn btn-outline-light rounded-pill px-3" href="{{ route('customer.register') }}">Register</a>
            </div>
            @endif
        </div>
    </nav>

    <!-- Custom Styles -->
    <style>
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: black;
                padding: 1rem;
                border-radius: 8px;
                margin-top: 1rem !important;
            }

            .navbar-collapse .nav-item {
                margin: 0.5rem 0;
            }

            .navbar-toggler {
                border: 1px solid rgba(255, 255, 255, 0.5);
                padding: 0.5rem 0.75rem;
            }

            .navbar-toggler:focus {
                box-shadow: none;
            }
        }

        .nav-link {
            position: relative;
            padding: 0.5rem 0;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #e83e8c;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Active state styling */
        .nav-link.active {
            color: #e83e8c !important;
        }

        .nav-link.active::after {
            width: 100%;
            background: #e83e8c;
            box-shadow: 0 0 10px rgba(232, 62, 140, 0.5);
        }
    </style>
</div>