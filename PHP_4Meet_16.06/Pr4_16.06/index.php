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
    <div class="container">
        <form method="post" action="">
            <div><label for="R" class="form-label">Red:<input type="number" name="R" id="R" class="form-control" required min=0 max=255></label></div>
            <div><label for="G" class="form-label">Green:<input type="number" name="G" id="G" class="form-control" required min=0 max=255></label></div>
            <div><label for="B" class="form-label">Blue:<input type="number" name="B" id="B" class="form-control" required min=0 max=255></label></div>
            <button class="btn btn-success" >Accept</button>
        </form>
        <span <? echo isset($_POST["R"])? "style='color: rgb(".$_POST["R"].",".$_POST["G"].",".$_POST["B"].")'":""?>>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque tempore sint reprehenderit ab molestiae maxime nesciunt quae laborum? Pariatur ea aperiam enim, tempore nam hic eius cumque. Consequuntur ipsam, ea laudantium ducimus, voluptatibus, dicta vitae totam et assumenda delectus animi distinctio quibusdam quod sequi magni alias doloribus sint quidem aliquid.</span>
    </div>
</body>
</html>