@extends('layouts.inner')
@section('title')
    Bill
@endsection
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Bill</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-users"></i>
            All Bill</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Rule</th>
                        <th>Total Meal</th>
                        <th>Meal Rate</th>
                        <th>Total Bill</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    @php
                        $i=1;
                    @endphp
                    <tbody>
                    @foreach($table as $row)
                        @php
                        $total_meal = $row->meal->where('monthID',session('monthID'))->sum('nom');
                        @endphp
                        <tr>
                            <td>{{$i++}}</td>
                            <td><img width="30" height="30" src="{{asset('public/upload/profile/'.$row->imageName)}}" alt="user image"></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->userType}}</td>
                            <td>{{pub_num($total_meal)}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->name}}</td>
                            <td class="text-right">
                                <button title="edit" class="btn btn-primary btn-sm p-0 ediBtn" data-id="{{$row->id}}" data-name="{{$row->name}}" data-email="{{$row->email}}" data-image="{{asset('public/upload/profile/'.$row->imageName)}}" data-toggle="modal" data-target="#myEdiModal"><i class="fa fa-edit"></i></button>
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
                var name = $(this).data('name');
                var email = $(this).data('email');
                var image = $(this).data('image');


                $('#ediID').val(id);
                $('#myEdiModal [name=name]').val(name);
                $('#myEdiModal [name=email]').val(email);
                $("#userImage1").attr("src", image);

            });
        });
        $(function () {

            $('.dataTable').DataTable({
                order: [[ 0, "desc" ]],
                iDisplayLength: 25,
                columnDefs: [
                    { orderable: false, "targets": [7] }//For Column Order
                ]
            });
        });
    </script>
@endsection