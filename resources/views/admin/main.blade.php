@extends('layouts.app')

@section('content')
        <a href="/create" class="btn btn-primary mt-3 mb-3" >Add Product</a>
        <a href="/category" class="btn btn-primary mt-3 mb-3" >Add Category</a>
        
        
        <!-- @if($message = Session::get('success'))
            <strong>{{$message}}</strong>
        @endif -->

        <table class="table">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Amount</th>
                <th scope="col">Category</th>
                <th></th>
              </tr>
            </thead>
                @foreach($products as $product)
    
            <tbody>
              <tr>
                <td><img src="{{asset('storage/images/' . $product->image)}}" width="50" height="50" alt=""></td>
                <td>{{$product->name}}</td>
                <td>Rp. {{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->category->category}}</td>
                

                <td>
                    <a href="/update/{{$product->id}}" class="btn btn-success">Edit</a>  

                    <form action="/delete/{{$product->id}}" method="POST">
                        @csrf
                        @method('delete')
                       <button class="btn btn-danger">Delete</button> 
                    </form>
                    
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>

      </div>

      @endsection