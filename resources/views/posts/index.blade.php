@include('partials.head')
@include('partials.nav')
<body>
<br>
<div class="card" style="width: 35rem;">
   <div class="card-body">
    <h1 class="card-title">Posts</h1>
    <table class="table table-bordered table-info">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Post title</th>
            <th scope="col">Created at</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        @foreach ($post as $post)
        <tbody>
          <tr class="table table-bordered">
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at->format('d.m.y') }}</td>
            <td><a href="{{ route('post.edit', $post->id) }}">Edit</a></td>
            <td><a href="{{ route('post.destroy', ['id' => $post->id]) }}">Delete</a></td> 
          </tr>
          @endforeach
        </tbody>
      </table>
    <a class="btn btn-info" href="/posts/create" role="button">Create post</a>
  </div>
</div>  
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
</body>
</html>