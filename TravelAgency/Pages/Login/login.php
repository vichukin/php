<?
    unsetForRegPage();
    unsetRegErrors();
?>
<?
    if(isset($_POST["logform"]))
    {
        unsetLofErrors();
        $login = $_POST["login"];
        $pass=$_POST["password"];
        $link = connect_To_DB("localhost","root");
        $q = "SELECT U.Login,U.Passwrd,U.Photo,R.RoleName FROM Users U LEFT JOIN Roles R ON U.RoleId=R.Id WHERE Login='$login'";
        $res = $link->query($q);
        $row = $res->fetch_array(MYSQLI_NUM);
        if($row)
        {
            if(password_verify($pass,$row[1]))
            {
                $_SESSION["isAuthorised"]=true;
                $_SESSION["login"]=$row[0];
                $_SESSION["photo"]=$row[2];
                $_SESSION["role"]=$row[3];
                unsetForLogin();
                echo "<script>
                    alert('successfully authorised!');
                    location = 'index.php';
                    </script>";
            }
            else
            {
                $_SESSION["loginError"]="Wrong password!";
            }
        }
        else
        {
            $_SESSION["loginform"]=$login;
            $_SESSION["loginError"]="Wrong login!";
        }
    }
?>
<div class="container">
    <div class="row">
        <div class="col">
            <form id="logform" method="POST">
                <? echo isset($_SESSION["loginError"]) ? "<div class='alert alert-danger' role='alert'>
                        " . $_SESSION["loginError"] . "
                    </div>" : "" ?>
                <div><label for="login" class="form-label">Login:<input type="text" required value="<? echo isset($_SESSION["loginform"]) ? $_SESSION["loginform"] : "" ?>" name="login" class="form-control"></label></div>
                <div><label for="password" class="form-label">Password:<input type="password" required name="password" class="form-control"></label></div>
            </form>
            <div class="btn-group">
                <button class="btn btn-success" form="logform" name="logform">Log in</button>
                <a class="btn btn-secondary" href="?page=5">Register</a>
            </div>
        </div>
    </div>
</div>
