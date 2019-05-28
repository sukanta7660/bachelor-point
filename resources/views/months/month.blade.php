@extends('layouts.master')
@extends('box.month.month')
@section('title')
    Months
@endsection
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Months</li>
    </ol>
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-2 col-xl-2 mb-3">
            <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#myModal">Create New Month</button>
        </div>
    </div>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-calendar-alt"></i>
            All Months</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Month</th>
                        <th>Total Meal</th>
                        <th>Total Expense</th>
                        <th>Meal Rate</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($table as $row)
                        <tr>
                            <td class="pt-0 pb-0">{{$row->monthID}}</td>
                            <td class="pt-0 pb-0">{{date('F, Y', strtotime($row->month_date))}}</td>
                            <td class="pt-0 pb-0">{{$row->monthID}}</td>
                            <td class="pt-0 pb-0">{{$row->monthID}}</td>
                            <td class="pt-0 pb-0">{{$row->monthID}}</td>
                            <td class="text-right pt-0 pb-0">
                                <a href="#" class="btn btn-info btn-sm p-0 pr-1 pl-1" title="details"><i class="fa fa-arrow-right"></i></a>
                                <button title="edit" class="btn btn-primary btn-sm p-0 ediBtn" data-id="{{$row->monthID}}" data-month="{{date('m/d/y', strtotime($row->month_date))}}" data-toggle="modal" data-target="#myEdiModal"><i class="fa fa-edit"></i></button>
                                <a href="#" title="delete" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger btn-sm p-0"><i class="fa fa-trash-alt"></i></a>
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
                var month = $(this).data('name');


                $('#ediID').val(id);
                $('#myEdiModal [name=month]').val(month);

            });
        });
        $(function () {

            $('.dataTable').DataTable({
                order: [[ 0, "desc" ]],
                iDisplayLength: 25,
                columnDefs: [
                    { orderable: false, "targets": [5] }//For Column Order
                ]
            });
        });

    </script>
@endsection