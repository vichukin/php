<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?
        
        $_SESSION["age"]= $_POST["age"];
        $name = $_SESSION["name"];
        $surname = $_SESSION["surname"];
        $age = $_SESSION["age"];
        echo "<label>Your infomation: $name $surname - $age".($age>1?" years ":" year ")."old</label>";
        echo "<h4>Your way: </h4>";
        $ar = $_SESSION["links"];
        foreach($ar as $key=>$value)
        {
            echo "<h5>$key: $value</h5>";
        }
    ?>

</body>
</html>