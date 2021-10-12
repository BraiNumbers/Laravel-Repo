@include('partials.head')
@include('partials.nav')
<body>
<br>
<div class="card" style="width: 35rem;">
<div class="card-body">
<h1 class="card-title">Create post</h1>
<form action="{{route('post.store')}}" method="post">
      @method('GET')
      @csrf
    <div class = 'mb-3' style="width: 30rem;">
      <label for="tpost">Title post:</label> 
      <textarea class="form-control" id="title" placeholder="Enter title" name="title" rows="1" required>{{ old('title') }}</textarea>
      <label for="dpost">Description post:</label>
      <textarea class="form-control" id="excerpt" placeholder="Enter description" name="excerpt" rows="2" required>{{ old('excerpt') }}</textarea>
    </div>
       <a href="index">Cancel</a>
       <button type="submit" class="btn1 btn btn-info">Submit post</button>
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


