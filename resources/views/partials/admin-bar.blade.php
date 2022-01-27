@auth
  <div class="card-header">Admin menu</div>
    <ul class="list-group list-group-flush">
        <a class="list-group-item" class="card-link" href="{{ route('admin.index') }}">
            Users
        </a>  
        <a class="list-group-item" class="card-link" href="{{ route('admin.posts') }}">
            Posts
        </a>  
        <a class="list-group-item" class="card-link" href="{{ route('admin.projects') }}">
            Projects
        </a> 
        <a class="list-group-item" class="card-link" href="{{ route('admin.tasks') }}">
           Tasks
        </a> 
        <a class="list-group-item" class="card-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
     </ul>
@endauth