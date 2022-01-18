@auth
  <div class="card-header">Menu</div>
    <ul class="list-group list-group-flush">
        <a class="list-group-item" class="card-link" href="/profile">
           My profile
        </a>  
        <a class="list-group-item" class="card-link" href="{{ route('user.posts') }}">
            My posts
        </a>  
        <a class="list-group-item" class="card-link" href="{{ route('user.projects') }}">
            My projects
        </a> 
        <a class="list-group-item" class="card-link" href="{{ route('user.tasks') }}">
            My tasks
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

