@extends('layouts.inner')
@section('title')
    Inner-Dashboard
@endsection
@section('content')
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{url('/')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
    </ol>
    <div class="row">
        <div class="col-md-12 col-xl-12 mb-3">
            <hr>
            <h4 class="text-muted text-center">{{$table->month_date}}</h4>
            <hr>
        </div>
    </div>

                        @php
                        $expense = $table->expense->sum('amount');
                        $meal = $table->meal->sum('nom');
                        if ($meal > 0 && $expense > 0){
                        $rate = $expense/$meal;
                        }
                        else
                        $rate = 0;
                        @endphp
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body text-center">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="">Mess Balance</div>
                    <div class="mt-2">{{money($table->balance)}}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body text-center">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="">Total Expense</div>
                    <div class="mt-2">{{money($expense)}}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body text-center">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="">Total Meal</div>
                    <div class="mt-2">{{pub_num($meal)}}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body text-center">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="">Meal Rate</div>
                    <div class="mt-2">{{pub_num($rate)}}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
    </div>
@endsection