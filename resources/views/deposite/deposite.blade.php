@extends('layouts.inner')
@extends('box.deposite.deposite')
@section('title')
    Deposite
@endsection
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Deposite</li>
    </ol>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if(session()->has('edit'))
        <div class="alert alert-info">
            {{ session()->get('edit') }}
        </div>
    @endif
    @if(session()->has('delete'))
        <div class="alert alert-danger">
            {{ session()->get('delete') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-2 col-xl-2 mb-3">
            <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#myModal">Add New Deposite</button>
        </div>
    </div>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-download"></i>
            All Deposits</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Date</th>
                        <th>Member</th>
                        <th class="text-right">Amount</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td class="pt-0 pb-0">{{$row->depositID}}</td>
                            <td class="pt-0 pb-0">{{pub_date($row->created_at)}}</td>
                            <td class="pt-0 pb-0">{{$row->members['name']}}</td>
                            <td class="text-right pt-0 pb-0">{{money($row->amount)}}</td>
                            <td class="text-right pt-0 pb-0">
                                <button title="edit" class="btn btn-primary btn-sm p-0 ediBtn" data-id="{{$row->depositID}}" data-amount="{{$row->amount}}" data-member="{{$row->userID}}" data-toggle="modal" data-target="#myEdiModal"><i class="fa fa-edit"></i></button>
                                <a href="{{url('deposit/del',['id' => $row->depositID])}}" title="delete" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger btn-sm p-0"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var amount = $(this).data('amount');
                var old_amount = $(this).data('amount');
                var member = $(this).data('member');


                $('#ediID').val(id);
                $('#old_amount').val(old_amount);
                $('#myEdiModal [name=amount]').val(amount);
                $('#myEdiModal [name=userID]').val(member);

            });
        });
        $(function () {

            $('.dataTable').DataTable({
                order: [[ 0, "desc" ]],
                iDisplayLength: 25,
                columnDefs: [
                    { orderable: false, "targets": [4] }//For Column Order
                ]
            });
        });

    </script>
@endsection