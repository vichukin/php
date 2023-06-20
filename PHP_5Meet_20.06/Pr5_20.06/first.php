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
    <form method="post" action="second.php">
        <label>
            Your name: 
            <input type="text" required name="name">
        </label>
        <button>Send</button>
    </form>
    <?
    $_SESSION["links"]["first"]= $_SERVER["PHP_SELF"];
    // if(isset($_SESSION["links"]["first"]))
    // {

    // }
    // if(isset($_POST["name"]))
    // {
    //     $_SESSION["links"]["first"]= $_SERVER["PHP_SELF"];
    //     $_SESSION["name"]= $_POST["name"];
    //     echo "<script>setTimeout(()=>{

    //         location = '/PHP_5Meet_20.06/Pr5_20.06/second.php';
    
    //     }, 2000);</script>";
    // }

    ?>
</body>
</html>