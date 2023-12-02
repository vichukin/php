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
    <div class="container">
    <h2>Products</h2>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?
            $link = mysqli_connect("localhost","root","","shopDB",3306);
            $query = "SELECT * FROM `Products`;";
            $res = mysqli_query($link,$query);
            
            while($arr = mysqli_fetch_array($res, MYSQLI_ASSOC))
            {
                ?>
                <tr>
                    <?
                    foreach($arr as $elem)
                    {
                    ?>
                    <td>
                        <?
                        echo $elem;
                        ?>
                    </td>
                    <?
                    }
                    ?>
                </tr>
                <?
            }
            
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>