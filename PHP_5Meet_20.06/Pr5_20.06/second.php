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
    <form method="post" action="third.php">
        <label>
            Your surname: 
            <input type="text" required min="1" name="surname">
        </label>
        <button>Send</button>
    </form>
    <?
        $_SESSION["name"]=$_POST["name"];
        $_SESSION["links"]["second"] = $_SERVER["PHP_SELF"];
    ?>
</body>
</html>