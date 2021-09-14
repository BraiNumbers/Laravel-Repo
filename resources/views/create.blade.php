<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database </title>
</head>
<body>
    @if (session('succes'))
        {{ session('succes') }}
    @endif
    <form action="{{route('create')}}" method="post">
        @csrf
        <input type="text" name="title">

<button type="submit" >Sent</button>
        
</form>
</body>
</html>


