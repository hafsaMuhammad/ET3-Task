@extends('orders.index')
@section('title', 'Show ')

@section('style')

<style>
   
</style>

@endsection


@section('content')

    <h1 class = " text-center p-5 display-3">Show order</h1>




    <div class="d-flex justify-content-center m-1">
      <div>
          <a class="btn btn-warning btn-dashboard mx-2" href="{{ route('orders.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> orders</a>
      </div>
      <div>
          <a class="btn btn-success" href="{{ route('orders.edit' , $order->id) }}" role="button"><i class="far fa-edit"></i> Edit</a>
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






    <form class="container mt-5" enctype="multipart/form-data">

      <div class="mb-4">
          <label for="total_cost" class="form-label lead">Total cost</label>
          <input type="text" class="form-control" id="total_cost" name="total_cost" value="{{ $order->total_cost }}" readonly>
      </div>

      <div class="mb-4">
          <label for="order_date" class="form-label lead">order date</label>
          <input type="text" class="form-control" id="order_date" name="order_date" value="{{ $order->order_date }}" readonly>
      </div>
      <div class="mb-4">
          <label for="customer_id" class="form-label lead">Customer ID</label>
          <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ $order->customer_id }}" readonly>
      </div>
      <div class="mb-4">
          <label for="employee_id" class="form-label lead">Employee ID</label>
          <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ $order->employee_id }}" readonly>
      </div>
      <div class="mb-4">
          <label for="id" class="form-label lead">Order ID</label>
          <input type="text" class="form-control" id="id" name="id" value="{{ $order->id }}" readonly>
      </div>

  </form>

@endsection