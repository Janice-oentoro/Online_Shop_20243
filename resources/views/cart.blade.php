<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="/create.css"> -->


    <title>Cart</title>
</head>

<body>

    <a href="/home" class="btn btn-success">Back</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Product</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Amount</th>
            <th></th>
          </tr>
        </thead>

        <tbody>
          @foreach(Cart::content() as $item) 
          @if($item->options->user_id == Auth::user()->id)
          <tr>
            <td><img src="{{asset('storage/images/' . $item->model->image)}}" 
              width="50" height="50" alt=""></td>
            <td>{{$item->name}}</td>
            <td>{{$item->category->category}}</td>

            <td>Rp. {{$item->price}}</td>
            
            <td>
              @if($item->qty > $item->model->stock)
              <input type="number" min="1" max="{{$item->model->stock}}" class="quantity" 
              data-id="{{$item->rowId}}" value="{{$item->qty}}" style="width:3em;">
              <span style="display:flex;flex-direction:column;">
                  <strong style="color:red;font-size:9px;">Please reduce item amount</strong>
              </span>
              @else
              <input type="number" min="1" max="{{$item->model->stock}}" class="quantity" 
              data-id="{{$item->rowId}}" value="{{$item->qty}}" style="width:3em;">
              @endif
            </td>


            <form action="/delete/{{$item->rowId}}" method="POST">
             @csrf
             @method('delete')
            <button class="btn btn-danger">Remove</button> 
            </form> 

          </tr>
          @endif
          @endforeach

          
        </tbody>
      </table>
      <br>

      




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>
</html>