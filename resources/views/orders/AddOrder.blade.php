@extends('orders.index')
@section('title', 'Add ')

@section('style')

<style>
   
</style>

@endsection


@section('content')



    <h1 class = " text-center p-5 display-3">add a new order</h1>

    <div class= "container text-center">
        <a class="btn btn-warning btn-dashboard p-2 px-5" href="{{ route('orders.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> Orders</a>
    </div>

    <form action="{{route('orders.store')}}" enctype="multipart/form-data" method="POST" class="container mt-5">
        @csrf
        <div class="mb-4">
            <label for="total_cost" class="form-label lead">total cost</label>
            <input type="text" class="form-control" id="total_cost" name="total_cost" >
        </div>
        <div class="mb-4">
            <label for="order_date" class="form-label lead">order date</label>
            <input type="date" class="form-control" id="order_date" name="order_date"  >
        </div>
        <div class="mb-4">
            <label for="customer_id" class="form-label lead">customer_id</label>
            <input type="text" name="customer_id"  id="customer_id"  class="form-control">
        </div>
        <div class="mb-4">
            <label for="employee_id" class="form-label lead">employee id</label>
            <input type="text" class="form-control" id="employee_id" name="employee_id" >
        </div>
        <button type="submit" class="btn py-1 w-100 btn-warning">Submit</button>
    </form>
@endsection




@if (Session::has('msg'))
    <div class="alert mb-0 alert-warning" role="alert">
        {{Session::get('msg')}}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif