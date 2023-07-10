<?
session_start();
include_once("Models/Image.php");
if(!isset($_GET["page"]))
    $_GET["page"]=1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark" >
  <div class="container-fluid">
    <a class="navbar-brand  text-white" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link  <?echo $_GET["page"]==1?"text-white":"text-white-50"?>"  href="?page=1">Gallery</a>
        <a class="nav-link  <?echo $_GET["page"]==2?"text-white":"text-white-50"?>" href="?page=2">Upload</a>
      </div>
      <div class="ms-auto">
        <?
                if (isset($_SESSION["isAuthorised"])) {
                ?>
                    <div class="me-3 pt-1">
                        <h5 class="mb-0 text-white">Hello, <? echo $_SESSION["login"] ?></h5>
                        <form method="POST"><button class="btn w-100 pb-1 pt-1 text-info bg-secondary" name="Logout">Log out</button></form>
                    </div>
                <?
                } else {
                ?>
                    <a  <?echo $_GET["page"]==3?"text-white":"text-white-50"?> href="?page=3" class="nav-link text-white">Login</a>
                <?
                }
        ?>
      </div>
    </div>
  </div>
</nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <?
                if(isset($_POST["Logout"]))
                {
                    unset($_SESSION["login"]);
                    unset($_SESSION["isAuthorised"]);
                    echo "<script>
                    location = document.URL;
          </script>";
                }
                if (isset($_GET["page"])) {
                    switch ($_GET["page"]) {
                        case 1:
                            include_once("Pages/gallery.php");
                            break;
                        case 2:
                            include_once("Pages/upload.php");
                            break;
                        case 3:
                            include_once("Pages/login.php");
                            break;
                        default:
                            echo "<h2>Page not found!</h2>";
                            break;
                    }
                } else {
                    include_once("Pages/gallery.php");
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>