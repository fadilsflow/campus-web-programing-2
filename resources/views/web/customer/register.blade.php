<x-layout>
    <div class="d-flex justify-content-center align-items-center " style="min-height: 80vh;">
        <div style="min-width: 350px; max-width: 400px; width: 100%;">
            <h3 class="mb-4 text-center" style="font-family: 'Orbitron', sans-serif; margin-top: 30px;">Register</h3>
            @if(session('errorMessage'))
            <div class="alert alert-danger">
                {{ session('errorMessage') }}
            </div>
            @endif
            <form method="POST" action="{{ route('customer.store_register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        value="{{ old('email') }}"
                        required
                        name="email">
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
                        value="{{ old('password') }}"
                        required
                        name="password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input
                        type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation"
                        value="{{ old('password_confirmation') }}"
                        required
                        name="password_confirmation">
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn w-100" style="background-color: #e83e8c; color: #fff; font-family: 'Orbitron', sans-serif;">Register</button>
            </form>
            <div class="mt-3 text-center">
                <small>Sudah memiliki akun? <a href="{{ route('customer.login') }}" style="color: #e83e8c;">Login</a></small>
            </div>
        </div>
    </div>
</x-layout>