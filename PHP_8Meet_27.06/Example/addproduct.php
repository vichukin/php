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
if(isset($_POST["title"]))
{
    
$link = mysqli_connect("localhost","root","","shopDB",port: 3306);
$title = $_POST["title"];
$quant = $_POST["quantity"];
$querytext = "INSERT INTO `Products`( `Title`, `Quantity`) VALUES ('$title','$quant')";
$res = mysqli_query($link,$querytext);
if($res)
    echo "successfully attached";
else 
    echo 'Little error';
}
else
{
?>
    <form method="POST">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="mb-3"><label for="title" class="form-label">Write title of product</label><input type="text" name="title" id="title" class="form-control" required>
                    <label for="quantity" class="form-label">Write quantity of Products</label><input type="number" min="1" name="quantity" id="quantity" required class="form-control">
                    <button class="btn btn-success">Add product</button>
                </div>
                </div>
            </div>
        </div>
    </form>
    


<?}?>
</body>
</html>