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
    <form method="post" action="result.php">
        <label>
            Your age: 
            <input type="number"  required name="age">
        </label>
        <button>Send</button>
    </form>
    <?
        $_SESSION["surname"]=$_POST["surname"];
        $_SESSION["links"]["third"] = $_SERVER["PHP_SELF"];
    ?>
</body>
</html>