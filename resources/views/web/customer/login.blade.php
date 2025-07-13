<x-layout>

    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div style="min-width: 350px; max-width: 400px; width: 100%;">
            <h3 class="mb-4 text-center" style="font-family: 'Orbitron', sans-serif;">Login</h3>
            @if(session('errorMessage'))
            <div class="alert alert-danger">
                {{ session('errorMessage') }}
            </div>
            @endif
            @if(session('successMessage'))
            <div class="alert alert-success">
                {{ session('successMessage') }}
            </div>
            @endif
            <form method="POST" action="{{ route('customer.login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        required>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>
                <button type="submit" class="btn  w-100" style="background-color: #e83e8c; color: #fff; font-family: 'Orbitron', sans-serif;">Masuk</button>
                <div class="mt-3 text-center">
                    <small>
                        Belum punya akun?
                        <a href="{{ route('customer.register') }}" style="color: #e83e8c;">Daftar disini</a>
                    </small>
                </div>
            </form>
        </div>
    </div>
</x-layout>