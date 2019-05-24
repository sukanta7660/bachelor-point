@extends('layouts.app')

@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                @csrf
                @error('email')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
                @enderror
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email address" required="required">
                        <label for="inputEmail">Email address</label>
                    </div>
                </div>
                @error('password')
                <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
                @enderror
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            Remember Password
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{ route('register') }}">Register an Account</a>
                @if (Route::has('password.request'))
                <a class="d-block small" href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
            </div>
        </div>
    </div>
@endsection
