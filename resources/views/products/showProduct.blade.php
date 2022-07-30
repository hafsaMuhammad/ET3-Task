@extends('products.index')
@section('title', 'Show ')

@section('style')

<style>
   
</style>

@endsection


@section('content')

    <h1 class = " text-center p-5 display-3">Show product</h1>




    <div class="d-flex justify-content-center m-1">
      <div>
          <a class="btn btn-warning btn-dashboard mx-2" href="{{ route('products.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> Products</a>
      </div>
      <div>
          <a class="btn btn-success" href="{{ route('products.edit' , $product->id) }}" role="button"><i class="far fa-edit"></i> Edit</a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="far fa-trash-alt"></i> Delete
          </button>
      </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Delete Product</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <p>are you sure to delete this product ?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <form action="{{route('products.destroy',$product->id)}}"  method="POST" class="form-delete">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
              </div>
          </div>
      </div>
    </div>






    <form class="container mt-5" enctype="multipart/form-data">

      <div class=" mb-2">
        <img src="{{ asset('storage/' . $product->path) }}" alt="{{ $product->image . " image" }}">
      </div>

      <div class="mb-4">
          <label for="name" class="form-label lead">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" readonly>
      </div>

      <div class="mb-4">
          <label for="price" class="form-label lead">Price</label>
          <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" readonly>
      </div>
      <div class="mb-4">
          <label for="category_id" class="form-label lead">Category ID</label>
          <input type="text" class="form-control" id="category_id" name="category_id" value="{{ $product->category_id }}" readonly>
      </div>
      <div class="mb-4">
        <label for="id" class="form-label lead">Product ID</label>
        <input type="text" class="form-control" id="id" name="id" value="{{ $product->id }}" readonly>
    </div>

  </form>

@endsection