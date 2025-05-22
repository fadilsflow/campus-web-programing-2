<div>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary font-bold">Sambat Urip</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="/about" class="nav-item nav-link">About</a>
                <a href="/services" class="nav-item nav-link">Services</a>
                @if($customer)
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-user me-2"></i>{{ $customer->name }}
                        </a>
                        <div class="dropdown-menu fade-down m-0">
                            <a href="/profile" class="dropdown-item">Profile</a>
                            <div class="dropdown-divider"></div>
                            <form action="/logout" method="POST" class="dropdown-item p-0">
                                @csrf
                                <button type="submit" class="btn btn-link text-dark text-decoration-none px-3 py-2 w-100 text-start">
                                    <i class="fa fa-sign-out me-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/customer/login" class="nav-item nav-link">Login</a>
                    <a href="/customer/register" class="nav-item nav-link">Register</a>
                @endif
            </div>
        </div>
    </nav>
</div>