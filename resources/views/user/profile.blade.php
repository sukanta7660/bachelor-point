@extends('layouts.master')
@section('title')
    {{Auth::user()->name}}
@endsection
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    <div class="row">
        <div class="col-md-12 col-xl-12 mb-3 text-center">
            @if(session()->has('errorMsg'))
                <div class="alert alert-danger">
                    {{ session()->get('errorMsg') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xl-12 mb-3 text-center">
            <hr>
            <h3>{{Auth::user()->name}}</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <img class="rounded-circle" style="max-width: 100%" src="{{asset('public/upload/profile/image-placeholder-350x350.png')}}" alt="">
        </div>
        <div class="col-md-9 mt-3">
            <p><span class="text-success">Name: </span>{{Auth::user()->name}}</p>
            <p><span class="text-success">Email: </span>{{Auth::user()->email}}</p>
            <button data-toggle="collapse" data-target="#updateForm" class="btn btn-primary btn-sm">Update Profile</button>
            <button data-toggle="collapse" data-target="#updatePass" class="btn btn-info btn-sm">Changes Password</button>

            <div id="updatePass" class="collapse multi-collapse mt-3 mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-body">
                            <form action="{{action('Auth\ChangePasswordController@change_password')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="old">Old Password</label>
                                    <input id="old" name="oldpassword" class="form-control form-control-sm @error('oldpassword') is-invalid @enderror" value="{{old('oldpassword')}}" autofocus type="password">
                                </div>
                                @if($errors->has('oldpassword'))
                                    <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('oldpassword') }}</strong>
                                </span>
                                @endif
                                <div class="form-group">
                                    <label for="new">New Password</label>
                                    <input id="new" name="password" class="form-control form-control-sm @error('password') is-invalid @enderror" type="password">
                                </div>
                                @if($errors->has('password'))
                                    <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                                <div class="form-group">
                                    <label for="confirm">Confirm New Password</label>
                                    <input id="confirm" name="password_confirmation" class="form-control form-control-sm" type="password">
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="updateForm" class="collapse multi-collapse mt-3 mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-body">
                            @if ($errors->any())
                                <div style="margin: 20px;" class="alert alert-danger">
                                    <ul style="list-style: circle">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{action('User\UserController@profile_info')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="userID" value="{{Auth::user()->id}}">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" value="{{Auth::user()->name}}" class="form-control form-control-sm" type="text" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input name="email" value="{{Auth::user()->email}}" class="form-control form-control-sm" type="text" placeholder="Email">
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection