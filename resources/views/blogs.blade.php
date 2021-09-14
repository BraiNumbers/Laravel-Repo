<!doctype html>
<title>Laravel</title>
<link rel="stylesheet" href="/app.css">  
    @foreach ($post as $post)
        <article>
                <h1>
                     <a href="/post/{{ $post->id }}">
                        {{ $post->title }}
                    </a>
                </h1> 

                <div>
                 {{ $post->excerpt }}
                </div>
        </article>
    @endforeach
</html>