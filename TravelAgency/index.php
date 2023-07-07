<?
session_start();
include_once("Pages/functions.php");
if (isset($_GET["page"]))
  $page = $_GET["page"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="Scripts/main.js"></script>
  <style>
    nav {
      background-color: rgb(220, 220, 220);
    }

    a {
      color: wheat;
    }
  </style>
</head>

<body>
  <?
  if (isset($_POST["logout"])) {
    unset($_SESSION["isAuthorised"]);
    unset($_SESSION["login"]);
    unset($_SESSION["photo"]);
    unset($_SESSION["role"]);
  }
  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  } else
    $page = 1;
  include_once("Pages/menu.php");
  ?>
  <section>

    <?php
    switch ($page) {
      case 1:
        include_once("Pages/tours.php");
        break;
      case 2:
        include_once("Pages/comments.php");
        break;
      case 3:
        include_once("Pages/admin.php");
        break;
      case 4:
        if (isset($_SESSION["isAuthorised"]))
          echo "<script>
          alert('You already authorised!');
          location = 'index.php';
          </script>";
        else
          include_once("Pages/Login/login.php");
        break;
      case 5:
        if (isset($_SESSION["isAuthorised"]))
          echo "<script>
          alert('You already authorised!');
          location = 'index.php';
          </script>";
        else
          include_once("Pages/Login/registration.php");
        break;
      default:
        echo "<h2>Page not found!</h2>";
        break;
    }


    ?>
  </section>
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
          <svg class="bi" width="30" height="24">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <span class="mb-3 mb-md-0 text-body-secondary">© 2023 Company, Inc</span>
      </div>

      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-twitter"></i></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-instagram"></i></a></li>
        <li class="ms-3"><a class="text-body-secondary" href="#"><i class="bi bi-facebook"></i></a></li>
      </ul>
    </footer>
  </div>
</body>

</html>