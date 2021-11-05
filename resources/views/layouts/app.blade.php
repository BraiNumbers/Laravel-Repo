@include('partials.head')

<body>
    <div id="app">
        
        @include('partials.nav-bar')

        <main class="container my-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
