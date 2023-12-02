<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
<h2>{{$title}}</h2>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Fullname</th>
            <th>Year of Birth</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($authors as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->firstname}} {{$item->surname}}</td>
                <td>{{$item->yearOfBirth}}</td>
                <td><a href="/authors/{{$item->id}}">Details</a></td>
            </tr>
        @empty

        @endforelse
    </tbody>
</table>
</body>
</html>
