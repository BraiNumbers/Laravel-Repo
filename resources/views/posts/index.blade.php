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

<h1>Posts</h1>

<a class="btn btn-info" href="/posts/create" role="button">Create post</a>

<table class="table table-info table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Post title</th>
      <th scope="col">Description</th>
      <th scope="col">Created at</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  @foreach ($post as $post)
  <tbody>
    <tr class="table-light">
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->excerpt }}</td>
      <td>{{ $post->created_at }}</td>
      <td><a href="{{ route('post.edit', $post->id) }}">Edit</a></td>
      <td><a href="{{ route('post.destroy', ['id' => $post->id]) }}">Delete</a></td> 
    </tr>
    @endforeach
  </tbody>
</table>
      
</body>
</html>