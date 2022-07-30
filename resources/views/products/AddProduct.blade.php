@extends('products.index')
@section('title', 'Add ')

@section('style')

<style>
   
</style>

@endsection


@section('content')



    <h1 class = " text-center p-5 display-3">add a new product</h1>

    <div class= "container text-center">
        <a class="btn btn-warning btn-dashboard p-2 px-5" href="{{ route('products.index') }}" role="button"><i class="fas fa-long-arrow-alt-left"></i> Products</a>
    </div>

    <form action="{{route('products.store')}}" enctype="multipart/form-data" method="POST" class="container mt-5">
        @csrf
        <div class="mb-4">
            <label for="name" class="form-label lead">Name</label>
            <input type="text" class="form-control" id="name" name="name" >
        </div>
        <div class="mb-4">
            <label for="price" class="form-label lead">Price</label>
            <input type="text" class="form-control" id="price" name="price"  >
        </div>
        <div class="mb-4">
            <label for="path" class="form-label lead">Image</label>
            <input type="file" name="path" placeholder="Choose image" id="path"  class="form-control">
        </div>
        <div class="mb-4">
            <label for="category_id" class="form-label lead">category id</label>
            <input type="text" class="form-control" id="category_id" name="category_id" >
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