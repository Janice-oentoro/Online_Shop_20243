@extends('layouts.app')

@section('content')
<div class="container">
  <a href="/cart" class="btn btn-success">Cart</a> 
    <div class="row justify-content-center">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Amount</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>

                <th></th>
              </tr>
            </thead>
                @foreach($products as $product)
    
            <tbody>
              <tr>
                <td>{{$product->name}}</td>
                <td>Rp. {{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->category->category}}</td>
                <td><img src="{{asset('storage/images/' . $product->image)}}" width="50" height="50" alt=""></td>
                <td>
                  <div class="form">
                    <form action="{{ url('cart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->nama }}">
                        <input type="hidden" name="price" value="{{ $product->harga }}">
                        <input type="submit" value="Add To Cart">
                    </form>
                   </div>  
    
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>







    </div>
</div>
@endsection
