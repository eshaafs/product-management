@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="/register" method="post">
              @csrf
                <div class="form-floating">
                    <input type="name" name="name" class="rounded-top form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                    <label for="name">Name</label>
                    @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{ old('name') }}" required>
                    <label for="username">Username</label>
                    @error('username')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
              <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('name') }}" required>
                <label for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password_confirmation" class="rounded-bottom form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password_confirmation">Confirm Password</label>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button class="mt-2 w-100 btn btn-lg btn-danger" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3 ">Already Registered? <a class="text-decoration-none fw-bold text-black" href="/login">Login</a></small>
        </main>
    </div>
</div>
@endsection