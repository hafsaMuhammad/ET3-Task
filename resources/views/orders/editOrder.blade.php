@extends('orders.index')
@section('title', 'Edit')

@section('style')

<style>
   
</style>

@endsection


@section('content')

@if ($errors->any())
<div class="alert alert-danger mt-0 pb-1">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('msg'))
<div class="alert alert-warning mt-0 pb-3" role="alert">
    {{Session::get('msg')}}
</div>
@endif

    <h1 class = " text-center p-5 display-3">edit orders</h1>


 

    <div class="d-flex justify-content-center m-1">
    <div class = "mx-5">
        <a class="btn btn-warning btn-dashboard" href="{{ route('orders.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> orders</a>
    </div>
    <div>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="far fa-trash-alt"></i> Delete
        </button>
    </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>are you sure to delete this order ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{route('orders.destroy',$order->id)}}"  method="POST" class="form-delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <form action="{{route('orders.update' , $order->id)}}" method="POST" class="container mt-5" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="mb-4">
        <label for="total_cost" class="form-label lead">Total cost</label>
        <input type="text" class="form-control" id="total_cost" name="total_cost" value="{{ $order->total_cost }}">
    </div>
    
    <div class="mb-4">
        <label for="order_date" class="form-label lead">order date</label>
        <input type="text" class="form-control" id="order_date" name="order_date" value="{{ $order->order_date }}">
    </div>
    <div class="mb-4">
        <label for="customer_id" class="form-label lead">customer id</label>
        <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ $order->customer_id }}">
    </div>
    <div class="mb-4">
        <label for="employee_id" class="form-label lead">employee id</label>
        <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ $order->employee_id }}">
    </div>
    
    <button type="submit" class="btn py-2 w-100 btn-warning mb-5">Submit</button>
    </form>


@endsection