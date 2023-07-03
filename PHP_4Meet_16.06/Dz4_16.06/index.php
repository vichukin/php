<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <nav class="btn-group"><a href="?page=1" class="btn btn-secondary">Show cars</a><a href="?page=2" class="btn btn-secondary">Add car</a></nav>
    <div class="container">
        <?
            include_once("Car.php");
            if(isset($_GET["page"]))
            {
                switch($_GET["page"])
                {
                    case 1:
                        include_once("showCars.php");
                        break;
                    case 2:
                        include_once("addCar.php");
                        break;
                    default:
                        echo "<h2>Page not found!</h2>";
                        break;
                }
            }
            else
            {
                include_once("showCars.php");
            }
        ?>
    </div>
</body>
</html>