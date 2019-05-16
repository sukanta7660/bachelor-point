@extends('layouts.app')

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                @error('name')
                <span class="text-danger" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputname" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Your Name" required autocomplete="name" autofocus>
                            <label for="inputname">Name</label>
                        </div>
                    </div>
                </div>
                @error('email')
                <span class="text-danger" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email address" required="required">
                        <label for="inputEmail">Email address</label>
                    </div>
                </div>
                @error('password')
                <span class="text-danger" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password" required="required">
                                <label for="inputPassword">Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-label-group">
                                <input type="password" id="confirmPassword" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm password"  required="required">
                                <label for="confirmPassword">Confirm password</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{ route('login') }}">Login Page</a>
                <a class="d-block small" href="#">Forgot Password?</a>
            </div>
        </div>
    </div>
@endsection