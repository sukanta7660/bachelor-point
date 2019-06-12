@extends('layouts.inner')
@extends('box.expense.expense')
@section('title')
    Expenses
@endsection
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{URL::previous()}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Inner Dashboard</li>
        <li class="breadcrumb-item active">Expense</li>
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
            <button class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#myModal">Add an Expense</button>
        </div>
        <div class="col-md-8 col-xl-8 mb-3"></div>
        <div class="col-md-2 col-xl-2 mb-3">
            <a href="{{URL::previous()}}" class="btn btn-danger btn-sm btn-block">Back</a>
        </div>
    </div>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-shopping-basket"></i>
            All Expenses</div>
        <div class="card-body">
            @foreach($table as $days => $expenses)
                <h4>{{$days}}</h4>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Items</th>
                        <th>Member</th>
                        <th class="text-right">Amount</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($expenses as $expense)
                        <tr>
                            <td class="pt-0 pb-0">{{$expense->expenseID}}</td>
                            <td class="pt-0 pb-0">{{$expense->name}}</td>
                            <td class="pt-0 pb-0">{{$expense->members['name']}}</td>
                            <td class="pt-0 pb-0 text-right">{{money($expense->amount)}}</td>
                            <td class="text-right pt-0 pb-0">
                                <button title="edit" class="btn btn-primary btn-sm p-0 ediBtn" data-id="{{$expense->expenseID}}" data-name="{{$expense->name}}" data-amount="{{$expense->amount}}" data-member="{{$expense->userID}}" data-toggle="modal" data-target="#myEdiModal"><i class="fa fa-edit"></i></button>
                                <a href="{{url('expense/del',['id'=>$expense->expenseID])}}" title="delete" onclick="return confirm('Are you sure to Delete?')" class="btn btn-danger btn-sm p-0"><i class="fa fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach

            <div class="table-responsive">

                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="text-right pt-0 pb-0">Total ({{$total_row}})</th>
                        <th class="text-right pt-0 pb-0">{{money($total_expense)}}</th>
                    </tr>
                    </thead>
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
                var amount = $(this).data('amount');
                var member = $(this).data('member');


                $('#ediID').val(id);
                $('#myEdiModal [name=name]').val(name);
                $('#myEdiModal [name=amount]').val(amount);
                $('#myEdiModal [name=userID]').val(member);

            });
        });

    </script>
@endsection