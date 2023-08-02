<x-auth>
    <x-slot name="title">Login</x-slot>
    <x-slot name="description">Masukkan data dengan sesuai agar dapat mengakses sistem.</x-slot>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                id="username" value="{{ old('username') }}">
            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input type="password" name="password"
                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password">
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <p class="mb-0 mt-4">
            <a href="{{ route('register') }}" class="text-center">
                <i class="fas fa-user-plus mr-1"></i>
                Register a new user</a>
        </p>
    </form>
</x-auth>