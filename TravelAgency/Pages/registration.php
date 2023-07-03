<?
    session_start();
    include_once("functions.php");
?>
<?
    if(isset($_POST["login"]))
    {
        // if($_POST["logerror"]=="f")
        //     echo "<h1>YES</h1>";
        // var_dump($_POST["logerror"]);
        unset($_SESSION["logerror"]);
        unset($_SESSION["passerror"]);
        $login = $_POST["login"];
        $email=$_POST["email"];
        $passwrd = $_POST["password"];
        $confpasswrd = $_POST["confpassword"];
        if($passwrd==$confpasswrd)
        {
            $pass = password_hash($passwrd,PASSWORD_DEFAULT);
            $connect = connect_To_DB("localhost","root");
            $query = "INSERT INTO `Users`( `Login`, `Email`, `Passwrd`, `Discount`, `RoleId`) VALUES ('$login','$email','$pass','0','4')";
            try
            {
                $connect->query($query);
                echo "<h1>Success</h1>";
            }
            catch(mysqli_sql_exception $e)
            {
                if ($e->getCode() == 1062) {
                    $_SESSION["logerror"]="t";
                    $_SESSION["login"]=$login;
                    $_SESSION["email"]=$email;
                    $_SESSION["password"]=$passwrd;
                    $_SESSION["confpassword"]=$confpasswrd;
                    echo "<script>
                    location = '/TravelAgency/index.php?page=4';
                    </script>";
                } else {
                    echo 'Ошибка MySQL: ' . $e->getMessage();
                }
            }
        }
        else
        {
            // echo"<h1>Pass dont match</h1>";
            // echo "<script>
            //     document.getElementById('passerror').value ='t';
            //     document.getElementById('regForm').submit();
            // </script>";
            $_SESSION["passerror"]="t";
            $_SESSION["login"]=$login;
            $_SESSION["email"]=$email;
            $_SESSION["password"]=$passwrd;
            $_SESSION["confpassword"]=$confpasswrd;
            echo "<script>
                    location = '/TravelAgency/index.php?page=4';
                    </script>";
        }
    }
    else
    {
?>
<div class="container">
    <div class="row row-cols-2">
        <div class="col">
            <form method="POST" action="?page=4" id="regForm">
                <div><label class="form-label">Login:
                    <?echo isset($_SESSION["logerror"])&&$_SESSION["logerror"]=="t"?"<div style='color: red;'>The login is already taken</div>":""?>
                    <input required name="login" type="text" value="<? echo isset($_SESSION["login"])?$_SESSION["login"]:""?>" class="form-control"></label></div>
                <div><label class="form-label">Email:<input required name="email" value="<? echo isset($_SESSION["email"])?$_SESSION["email"]:""?>" type="email" class="form-control"></label></div>
            
                <div><label  class="form-label">Password:
                    <?echo isset($_SESSION["passerror"])&&$_SESSION["passerror"]=="t"?"<div style='color: red;'>Passwords doesn't match!</div>":""?>
                    <input name="password" type="password" value="<? echo isset($_SESSION["password"])?$_SESSION["password"]:""?>" required class="form-control"></label></div>
            
                <div>
                    <label  class="form-label">Confirm password:
                        <?echo isset($_SESSION["passerror"])&&$_SESSION["passerror"]=="t"?"<div style='color: red;'>Passwords doesn't match!</div>":""?>
                        <input name="confpassword" type="password" value="<? echo isset($_SESSION["confpassword"])?$_SESSION["confpassword"]:""?>" required class="form-control"></label></div>
                <button class="btn btn-success">Register</button>
            </form>
        </div>
    </div>
</div>
<?
}

?>