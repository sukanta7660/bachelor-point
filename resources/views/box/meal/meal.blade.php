@section('box')
    <!-- Modal: modalAbandonedCart-->
    <div class="modal fade right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading">Add Today's Meal [ {{date('d/m/y')}} ]
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
                <form action="{{url('meal/save')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Check</th>
                                        <th>Member</th>
                                        <th class="text-right">Meal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $row)
                                        <tr>
                                            <td class="pt-0 pb-0">
                                                <input class="form-control form-control-sm" name="userID[{{$row->id}}]" value="{{$row->id}}" type="checkbox" checked>
                                            </td>
                                            <td class="pt-1 pb-1">{{$row->name}}</td>
                                            <td class="pt-1 pb-1 text-right">
                                                <div class="">
                                                    <input style="width: 73px;" type="number" name="meal[{{$row->id}}]" value="2.5" step="any" min="0"  required/>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <!--Footer-->
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-info btn-sm">Save Meal</button>
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
                    <p class="heading">Edit Meal
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
                <form action="{{url('meal/edit')}}" method="post" id="ediForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="ediID" name="id">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Member</th>
                                        <th class="text-right">Meal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pt-1 pb-1" id="name"></td>
                                            <td class="pt-1 pb-1 text-right">
                                                <div class="">
                                                    <input style="width: 73px;" type="number" name="meal" value="2.5" step="any" />
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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