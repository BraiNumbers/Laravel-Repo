<link rel="stylesheet" type="text/css" href="{{ url('style.css') }}" />

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand">{{ env('APP_NAME', 'Laravel') }}</a>
    
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                                
                @guest
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    
                 @else
                   @if(auth()->user()->is_admin == 1)
                     <li class="nav-item">
                        <a class="nav-link" href="/admin/users">Admin panel</a>
                     </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Posts</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                       <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                         <li><a class="dropdown-item" href="/profile">My profile</a></li>
                         <li><a class="dropdown-item" href="{{ route('user.posts') }}">My posts</a></li>
                         <li><a class="dropdown-item" href="{{ route('user.projects') }}">My projects</a></li>
                         <li><a class="dropdown-item" href="{{ route('user.tasks') }}">My tasks</a></li>
                         <li><a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                         </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </ul>
                 @endguest
            </ul>
        </div>
    </div>
 </nav>
  
  @if(session()->has('message'))
    <div style="padding: 5px;">
      <div class="alert alert-dark alert-dismissible fade show" role="alert">
         {{ session('message') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
   @endif