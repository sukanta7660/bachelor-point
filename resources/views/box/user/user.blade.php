@section('box')
    <!-- Modal: modalAbandonedCart-->
    <div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Add New Member
                    </p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <form action="{{url('user/create')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name"> Name:</label>
                                    <input class="form-control form-control-sm" placeholder="Enter Name..." value="{{ old('name') }}" id="name" name="name" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email"> Email:</label>
                                    <input class="form-control form-control-sm" placeholder="Enter Email..." id="email" value="{{ old('email') }}" name="email" type="text">
                                </div>
                            </div>
                            @error('password')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email"> Password:</label>
                                    <input class="form-control form-control-sm" placeholder="Enter Password..." id="password" name="password" type="password">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Confirm Password:</label>
                                    <input class="form-control form-control-sm" placeholder="Enter Confirm Password..." id="password_confirmation" name="password_confirmation" type="password">
                                </div>
                            </div>
                            @error('imageName')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="imageName">Image:</label>
                                    <input class="form-control form-control-sm" id="imageName" onchange="document.getElementById('userImage').src = window.URL.createObjectURL(this.files[0])" name="imageName" type="file">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <img style="height: 100px; width: 200px; margin-top: 10px" id="userImage" alt="your image" />
                            </div>
                        </div>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-right">
                        <button type="submit" class="btn btn-info btn-sm">Save Member</button>
                        <button type="button" class="btn btn-outline-info btn-sm text-black-50" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
                <!--Body-->
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Modal: modalAbandonedCart-->



    <!-- Modal: modalAbandonedCart-->
    <div class="modal fade right" id="myEdiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Edit User
                    </p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <form action="{{url('user/edit')}}" method="post" id="ediForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="ediID" name="id">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name"> Name:</label>
                                    <input class="form-control form-control-sm" placeholder="Enter Name..." value="{{ old('name') }}" id="name" name="name" type="text">
                                </div>
                            </div>
                            <div class="col-md-12">
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email"> Email:</label>
                                    <input class="form-control form-control-sm" placeholder="Enter Email..." id="email" value="{{ old('email') }}" name="email" type="text">
                                </div>
                            </div>
                            @error('imageName')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="imageName">Image:</label>
                                    <input class="form-control form-control-sm" id="imageName1" onchange="document.getElementById('userImage1').src = window.URL.createObjectURL(this.files[0])" name="imageName" type="file">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <img style="height: 100px; width: 200px; margin-top: 10px" id="userImage1" alt="your image" />
                            </div>
                        </div>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-info btn-sm">Save Changes</button>
                        <button type="button" class="btn btn-outline-info btn-sm text-black-50" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
                <!--Body-->
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Modal: modalAbandonedCart-->
@endsection
