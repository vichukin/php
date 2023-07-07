<?
include_once("Models/Functions.php");
include_once("Models/User.php");
if (isset($_POST["registerform"])) {
?>
    <form id="register" method="POST">
        <? echo isset($_SESSION["registerError"]) ? "<div class='alert alert-danger' role='alert'>
  " . $_SESSION["loginError"] . "
</div>" : "" ?>
        <div><label for="login" class="form-label">Login:<input type="text" required name="login" class="form-control"></label></div>
        <div><label for="password" class="form-label">Password:<input type="password" required name="password" class="form-control"></label></div>
        <div><label for="confpassword" class="form-label">Confirm password:<input type="password" required name="confpassword" class="form-control"></label></div>
        <div class="btn-group">
            <button class="btn btn-success" name="register">Register</button>
            <a href="?page=3" class="btn btn-secondary">Log in</a>
        </div>
    </form>
    <form id="regform" method="post">
    </form>

<?
} else if (isset($_POST["logform"])) {
    $login = $_POST["login"];
    $pass = $_POST["password"];
    $_SESSION["loginform"]=$login;
    $validate = ValidateForLogIn($login, $pass);
    // echo $validate."- result from validate";

    if ($validate == "") {
        $_SESSION["isAuthorised"] = true;
        $_SESSION["login"] = $login;

        unset($_SESSION["RegisterError"]);
            unset($_SESSION["loginError"]);
        echo "<script>
            alert('Successfully authorised!');
            location = 'index.php';
          </script>";
    } else {
        $_SESSION["loginError"] = $validate;
        echo "<script>
            location = document.URL;
          </script>";
    }
}
else if(isset($_POST["register"])){
    $pass = $_POST["password"];
    $confpass = $_POST["confpassword"];
    $login = $_POST["login"];
    if($pass==$confpass)
    {
        $validate = ValidateForRegister($login);
        if($validate=="")
        {
            $user = new User($login,password_hash($pass,PASSWORD_DEFAULT));
            $str = serialize($user);
            $file = fopen("Files/Users.json","a");
            fwrite($file,$str."\n");
            $_SESSION["isAuthorised"] = true;
            $_SESSION["login"] = $login;
            fclose($file);
            unset($_SESSION["RegisterError"]);
            unset($_SESSION["loginError"]);
            echo "<script>
            alert('Successfully registered');
            location = 'index.php';
          </script>";

        }
        else
        {
            $_SESSION["RegisterError"] = $validate;
            echo "<script>
            document.getElementById('regForm').submit();
        </script>";
        }
    }
}
 else {
?>
    <form id="logform" method="POST">
        <? echo isset($_SESSION["loginError"]) ? "<div class='alert alert-danger' role='alert'>
  " . $_SESSION["loginError"] . "
</div>" : "" ?>
        <div><label for="login" class="form-label">Login:<input type="text" required value="<?echo isset($_SESSION["loginform"])?$_SESSION["loginform"]:""?>" name="login" class="form-control"></label></div>
        <div><label for="password" class="form-label">Password:<input type="password" required name="password" class="form-control"></label></div>
    </form>
    <form id="regform" method="post"></form>
    <div class="btn-group">
        <button class="btn btn-success" form="logform" name="logform">Log in</button>
        <button class="btn btn-secondary" form="regform" name="registerform">Register</button>
    </div>
<?
}
?>
