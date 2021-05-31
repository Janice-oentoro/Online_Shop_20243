<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" 
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/create.css"> -->
  <title>Add New Product</title>

</head>
<body>
    <div class="container">
        <h1>Add New Product</h1>
        <form action="/stores" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
              <label for="category">Category</label>
              <select name="category_id" class="form-control" id="">
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->category}}</option>
                @endforeach
              </select> 
            </div>

            <div class="form-group">
              <label for="name">Product</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" 
              name="name" id="name" placeholder="Product Name">

              @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
          

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" 
                name="price" id="price" placeholder="Price">

                @error('price')
                  <div class="invalid-feedback">
                   {{$message}}
                  </div>
                @enderror
              </div>

            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="number" class="form-control @error('stock') is-invalid @enderror" 
              name="stock" id="stock" placeholder="Product Stock">

              @error('amount')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="image" id="image">
            </div>
        
            <a href="/main" class="btn btn-success">Back</a>
            <button class="btn btn-primary">Add Product</button>

          </form>
    </div>

    
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