<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>You in home page {{$name}}</h2>
    <div>
        <ul>
            @foreach ($frameworks as $elem)
            <li>{{$elem}}</li>
            @endforeach
        </ul>
    </div>
</body>
</html>
