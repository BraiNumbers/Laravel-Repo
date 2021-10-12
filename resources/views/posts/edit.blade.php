    @include('partials.head')
    @include('partials.nav')
<body>
<br>
<div class="card" style="width: 35rem;">
<div class="card-body">
<h1 class="card-title">Update post</h1>
<form action="{{route('post.update', $post->id)}}" method="post">
      @csrf
      <div class = 'mb-3'>
      <label for="tpost">Title post:</label> 
      <textarea type="text" class="form-control" id="title" name="title" rows="1" required>{{ $post->title }}</textarea>
      <label for="dpost">Description post:</label>
      <textarea type="text" class="form-control" id="excerpt" name="excerpt" rows="2" required>{{ $post->excerpt }}</textarea>
    </div>
     <a href="/posts/index">Cancel</a>
     <button type="submit" class=" btn1 btn btn-info">Update post</button>
  </form>
  </div>
</div>  
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>