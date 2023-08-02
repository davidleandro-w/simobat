<x-auth>
    <x-slot name="title">Register</x-slot>
    <x-slot name="description">User yang pertama kali dibuat, perlu diaktifkan oleh admin terlebih dahulu.</x-slot>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="fullname">Fullname</label>
            <input type="text" name="fullname" class="form-control {{ $errors->has('fullname') ? 'is-invalid' : '' }}"
                id="fullname" value="{{ old('fullname') }}">
            @error('fullname')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
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
        <div class="form-group mb-4">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation"
                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                id="password_confirmation">
            @error('password_confirmation')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
        <p class="mb-0 mt-4">
            <a href="{{ route('login') }}" class="text-center">
                <i class="fas fa-sign-in-alt mr-1"></i>
                Login</a>
        </p>
    </form>
</x-auth>