@extends('layouts.inner')
@extends('box.meal.meal')
@section('title')
    Meal
@endsection
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{URL::previous()}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Inner Dashboard</li>
        <li class="breadcrumb-item active">Meal</li>
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
        @if($ckdate == null)
        <div class="col-md-2 col-xl-2 mb-3">
            <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#myModal">Add Meal</button>
        </div>
        @else
            <div class="col-md-2 col-xl-2 mb-3">
                <button class="btn btn-success btn-sm btn-block border-0">Already Done</button>
            </div>
        @endif
        <div class="col-md-8 col-xl-8 mb-3"></div>
        <div class="col-md-2 col-xl-2 mb-3">
            <a href="{{URL::previous()}}" class="btn btn-danger btn-sm btn-block">Back</a>
        </div>
    </div>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-shopping-basket"></i>
            All Meal</div>
        <div class="card-body">
            @foreach($table as $days => $meals)
                <h4>{{$days}}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Member</th>
                            <th class="text-right">Meal</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($meals as $meal)
                            <tr>
                                <td class="pt-0 pb-0">{{$meal->mealID}}</td>
                                <td class="pt-0 pb-0">{{$meal->members['name']}}</td>
                                <td class="pt-0 pb-0 text-right">{{meal($meal->nom)}}</td>
                                <td class="text-right pt-0 pb-0">
                                    <button title="edit" class="btn btn-primary btn-sm p-0 ediBtn" data-id="{{$meal->mealID}}" data-member="{{$meal->members['name']}}" data-meal="{{meal($meal->nom)}}" data-toggle="modal" data-target="#myEdiModal"><i class="fa fa-edit"></i></button>
                                    <a href="" title="delete" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger btn-sm p-0"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var member = $(this).data('member');
                var meal = $(this).data('meal');


                $('#ediID').val(id);
                $('#myEdiModal [name=meal]').val(meal);
                $('#name').html(member);

            });
        });

    </script>
@endsection