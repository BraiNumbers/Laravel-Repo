<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>  
    <title>Laravel</title>
    @include('partials.nav')
   
    
</head>
<body>
<br>
<h1>Create post</h1>

   
<form action="{{route('post.store')}}" method="post">
      @method('GET')
      @csrf
    <div class="form-group">
      <label for="tpost">Title post:</label> 
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" required>
    </div>
    <div class="form-group">
      <label for="dpost">Description post:</label>
      <input type="text" class="form-control" id="excerpt" placeholder="Enter description" name="excerpt" required>
    </div>
    <br>
      <button type="submit" class=" btn1 btn btn-info">Submit post</button>
  </form>

</body>
</html>


