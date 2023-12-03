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
        $page=$_GET["page"];
    }
    else
        $page=1;
    ?>
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="?page=1" class="nav-link <?echo $page==1?'active':''?>" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="?page=2" class="nav-link <?echo $page==2?'active':''?>">Add product</a></li>
      </ul>
    </header>
    <div class="container">
        <div class="row">
            <?

                if($page==1)
                    include("products.php");
                else if($page==2)
                    include("addproduct.php");
                else if($page==3)
                    include("editproduct.php");
            ?>
        </div>
    </div>
</body>
</html>