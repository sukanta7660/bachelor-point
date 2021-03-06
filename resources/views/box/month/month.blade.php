@section('box')
    <!-- Modal: modalAbandonedCart-->
    <div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Add A New Month
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
                <form action="{{url('month/save')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="datepicker">Month:</label>
                                    <input class="form-control form-control-sm" name="month" placeholder="Ex: January-2019/February-2019" type="text">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-right">
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
                    <p class="heading">Edit Month
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
                <form action="{{url('month/edit')}}" method="post" id="ediForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="ediID" name="monthID">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="datepicker1">Month:</label>
                                    <input class="form-control form-control-sm" name="month" placeholder="Ex: January-2019/February-2019" type="text">
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-right">
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