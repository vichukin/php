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
    date_default_timezone_set('Europe/Warsaw');
    if (isset($_COOKIE["counter"])) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            setcookie("counter", '', -1);
            setcookie("fullname", '', -1);
            setcookie("last", '', -1);
            echo "<script>
                location = document.URL;
                </script>";
        } else {
    ?>

            <div>
                <h2>Hello, <? echo $_COOKIE["fullname"] ?></h2>
                <h3>You visited <? echo $_COOKIE["counter"] . " " . ($_COOKIE["counter"] > 1 ? "times" : "time") ?></h3>
                <h4>Last visit: <? echo date("Y-m-d H:i:s", $_COOKIE["last"]) ?></h4>
                <form method="post">
                    <button>Clear cookies</button>
                </form>
            </div>
        <?
            $_COOKIE["counter"]++;
            $_COOKIE["last"] = time();
            setcookie("counter", $_COOKIE["counter"], time() + 60 * 60);
            setcookie("fullname", $_COOKIE["fullname"], time() + 60 * 60);
            setcookie("last", $_COOKIE["last"], time() + 60 * 60);
        }
    } else {
        if (!isset($_POST["fullname"])) {
        ?>

            <form method="post">
                <div><label for="fullname">Fullname:<input name="fullname" type="text"></label></div>
                <button>Set cookie</button>
            </form>
    <?
        } else {
            setcookie("counter", 1, time() + 60 * 60);
            setcookie("fullname", $_POST["fullname"], time() + 60 * 60);
            setcookie("last", time(), time() + 60 * 60);
            echo "<script>
                location = document.URL;
                </script>";
        }
    }
    ?>
</body>

</html>