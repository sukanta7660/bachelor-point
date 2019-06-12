@section('box')
    <!-- Modal: modalAbandonedCart-->
    <div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Add A Deposit
                    </p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{url('deposit/save')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="member">Select Member:</label>
                                    <select class="form-control form-control-sm" name="userID" id="member">
                                        <option value="">Select a Member</option>
                                        @foreach($users as $row)
                                            <option value="{{$row->id}}">{{$row->name}} [{{$row->userType}}]</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="amount">Amount:</label>
                                    <input class="form-control form-control-sm" id="amount" name="amount" step="any" value="0" type="number">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-info btn-sm">Save Month</button>
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
                    <p class="heading">Edit Deposit
                    </p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{url('deposit/edit')}}" method="post" id="ediForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="ediID" name="id">
                    <input type="hidden" id="old_amount" name="old_amount">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="member">Select Member:</label>
                                    <select class="form-control form-control-sm" name="userID" id="member">
                                        <option value="">Select a Member</option>
                                        @foreach($users as $row)
                                            <option value="{{$row->id}}">{{$row->name}} [{{$row->userType}}]</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="amount">Amount:</label>
                                    <input class="form-control form-control-sm" id="amount" name="amount" step="any" value="0" type="number">
                                </div>
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