<!DOCTYPE html>
<html lang="en">
<head>
  <?
      $session = session();
      $user_data = $session->get();
  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=esc($title)?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3" aria-label="Third navbar example">
    <div class="container-fluid ">
      

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav w-100 mb-2 mb-sm-0 ">
          <li class="nav-item">
            <a class="nav-link active"  href="/">Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/authors">Authors</a>
          </li>
          <?
            if(isset($user_data["login"])&&$user_data["isAdmin"]==0)
            {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="/getadmin">Get admin role</a>
              </li>
              <?
            }
          ?>
          <li class="nav-item ms-auto">
            
            <a href="<?echo isset($user_data["login"])?"/logout":"/login"?>" class="nav-link"><?echo isset($user_data["login"])?"Log out":"Log in"?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="container">
    <div class="row">
        <div class="col">
    <h1 class="text-center"><?=esc($title)?></h1>