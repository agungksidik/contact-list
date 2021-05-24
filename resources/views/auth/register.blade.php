@extends('layouts.auth', ['title' => 'Register'])

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            Register
        </div>
        <div class="card-body">
            <form action="/register" method="post">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror">
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
                    <label for="password_confirmation">Confirmation Password</label>
                    <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <div class="form-group">
                    <label for="role">Select Role</label>
                    <select required class="form-select @error('role') is-invalid @enderror" name="role" id="role" aria-label="Default select example">
                        <option value="">Select Role</option>
                        <option value="2">Admin</option>
                        <option value="3">Agen</option> 
                    </select>
                    @error('role')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                


                <div class="d-grid gap-2 mt-3">
                    <button type="submit" class="btn btn-primary" type="button">Register</button>
                </div>
                <div class="text-center mt-3">
                    Already have account ? <a href="/login">Login</a>
                </div>

            </form>

        </div>
    </div>


</div>
@endsection