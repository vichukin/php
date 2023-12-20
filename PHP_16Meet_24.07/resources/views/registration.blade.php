<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <div class="row mt-5 pt-5">

        <div class="col col-4"></div>
        <div class="col col-4">
        <h1 class="text-center">Registration form</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
         </ul>
        </div>
        @endif

        <form method="POST" >
            @csrf
            <div class="mb-3"><label class="w-100" >Login:<input type="text" class="form-control" name="login" value="{{ old('login') }}"></label></div>
            <div class="mb-3"><label class="w-100" >Email:<input type="email" class="form-control" name="email" value="{{ old('email') }}"></label></div>
            <div class="mb-3"><label class="w-100" >Your age:<input type="number" class="form-control" name="age" value="{{ old('age') }}"></label></div>
            <div class="mb-3"><label class="w-100" >Password:<input type="password" class="form-control" name="password" value="{{ old('password') }}"></label></div>
            <div class="mb-3"><label class="w-100" >Confirm password:<input type="password" class="form-control" name="confpassword" value="{{ old('confpassword') }}"></label></div>
            <div class="mb-3"><button class="btn btn-outline-success w-100">Send</button></div>
        </form>
        </div>
        <div class="col col-4"></div>
    </div>
</div>
</body>
</html>
