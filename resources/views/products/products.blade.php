@extends('products.index')
@section('title', ' ')

@section('style')

<style>
   
</style>

@endsection


@section('content')


    <h1 class = " text-center p-5 display-3">products</h1>
    <div class= 'container'>

        <div class= "container text-center my-2">
            <a class="btn btn-warning btn-dashboard p-2 px-5" href="http://127.0.0.1:8000/" role="button"><i class="fas fa-long-arrow-alt-left"></i> Home</a>
        </div>
        <div >
            <form action="{{route('products.create')}}"  method="POST" class="form-create text-center">
                @csrf
                @method('GET')
                <button type="submit" class="btn btn-warning btn-lg my-3">Create New Product</button>
            </form>

        </div>
    

        <table class="table table-warning">
            <thead>
            <tr>
                <th scope="col">Product id</th>
                <th scope="col">name</th>
                <th scope="col">price</th>
                <th scope="col">image</th>
                <th scope="col"> </th>
            </tr>
            </thead>
            <tbody>

            @foreach ($products as $product)
                <tr>
                  <th scope="row">{{ $product->id }}</th>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->price }}</td>
                  <td>{{ $product->image }}</td>
                  <td>
                    <a href="{{route('products.edit',$product->id)}}" class="btn btn-success mx-2">Edit</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger my-3 " data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="far fa-trash-alt"></i> Delete
                    </button>
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
                                <div class="modal-footer my-3">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{route('products.destroy',$product->id)}}"  method="POST" class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>

                        <form action="{{route('products.show',$product->id)}}"  method="POST" class="form-show">
                            @csrf
                            @method('GET')
                            <button  type="submit"  class="btn btn-secondary mx-3">Show </button>
                        </form>

                    </td>
                </tr>
            @endforeach
           
            </tbody>
        </table>
    </div>
@endsection