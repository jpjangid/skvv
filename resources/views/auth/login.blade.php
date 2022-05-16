@extends('front.layouts.app')

@section('title','Login')

@section('content')
<section class="login my-5">
    <div class="py-3 form login-form" style="color: black;">
        <h2 class="text-uppercase text-center font-weight-bold pb-3 founder">Login</h2>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="px-5 form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="px-5 form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="Enter password" name="password"  required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="px-5 checkbox">
                <label><input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me</label>
            </div>
            <div class="px-5 form-group text-center">
                <label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forget Password?</a>
                @endif    
                </label>
            </div>
            <div class="px-5 form-group text-center">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <div class="px-5 form-group text-center">
                <label>Don't have an account!</label>
                <a href="register.html">Create Account</a>
            </div>
        </form>
    </div>
</section>
@endsection

