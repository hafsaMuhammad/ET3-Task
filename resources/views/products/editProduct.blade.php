@extends('products.index')
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


    <h1 class = " text-center p-5 display-3">edit products</h1>




    <div class="d-flex justify-content-center m-1">
    <div class = "mx-5">
        <a class="btn btn-warning btn-dashboard" href="{{ route('products.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> Products</a>
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
    <form action="{{route('products.update' , $product->id)}}" method="POST" class="container mt-5" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="product-image mb-2">
        <img src="{{ asset('storage/' . $product->path) }}" alt="{{ $product->image . " image" }}">
    </div>

    <div class="mb-4">
        <label for="name" class="form-label lead">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
    </div>
    
    <div class="mb-4">
        <label for="price" class="form-label lead">Price</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
    </div>
    <div class="mb-4">
        <label for="category_id" class="form-label lead">category id</label>
        <input type="text" class="form-control" id="category_id" name="category_id" value="{{ $product->category_id }}">
    </div>
    
    <button type="submit" class="btn py-2 w-100 btn-warning mb-5">Submit</button>
    </form>


@endsection