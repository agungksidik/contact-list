@extends('layouts.auth', ['title' => 'Login'])

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            Login
        </div>
        <div class="card-body">
            <form action="/logged_in" method="post">
                @csrf

                @if (\Session::has('error'))
                    <div class="alert alert-danger">
                        {!! \Session::get('error') !!}
                    </div>
                @endif

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Select Role</label>
                    <select class="form-select @error('role') is-invalid @enderror" name="role" id="role" aria-label="Default select example" required>
                        <option value="">Select Role</option>
                        <option value="super admin" @if (old('role') == "super admin") {{ 'selected' }} @endif>Super Admin</option>
                        <option value="admin" @if (old('role') == "admin") {{ 'selected' }} @endif>Admin</option>
                        <option value="agen" @if (old('role') == "agen") {{ 'selected' }} @endif>Agen</option> 
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>



                <div class="d-grid gap-2 mt-3">
                    <button type="submit" class="btn btn-primary" type="button">Login</button>
                </div>

                <div class="text-center mt-3">
                    Don't have account ? <a href="/register">Register</a>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection