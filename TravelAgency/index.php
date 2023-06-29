<?
    session_start();

    if(isset($_GET["page"]))
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
<?
    if(isset($_GET["page"]))
    {
        $page = $_GET["page"];
    }
    else
        $page=1;
    include_once("Pages/menu.php");
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                        $page = $_GET["page"];
                        switch($page)
                        {
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
                                include_once("Pages/registration.php");
                                break;
                            default:
                                echo "<h2>Page not found!</h2>";
                                break;
                        }

                    
                ?>
            </div>
        </div>
    </div>
</section>
<footer>
    My Travel Agency
</footer>
</body>
</html>