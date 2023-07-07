<?
session_start();
unsetForLogin();
unsetLofErrors();
include_once("Pages/functions.php");
?>
<?
if (isset($_POST["register"])) {
    // if($_POST["logerror"]=="f")
    //     echo "<h1>YES</h1>";
    // var_dump($_POST["logerror"]);
    unsetRegErrors();
    $login = $_POST["login"];
    $email = $_POST["email"];
    $passwrd = $_POST["password"];
    $confpasswrd = $_POST["confpassword"];
    $photo = base64_encode(file_get_contents($_FILES["photo"]["tmp_name"]));
    if ($passwrd == $confpasswrd) {
        $pass = password_hash($passwrd, PASSWORD_DEFAULT);
        $connect = connect_To_DB("localhost", "root");
        $query = "INSERT INTO `Users`( `Login`, `Email`, `Passwrd`,`Photo`, `Discount`, `RoleId`) VALUES ('$login','$email','$pass','$photo','0','4')";
        // echo"<h2>I'm here</h2>";
        try {
            $connect->query($query);
            unsetForRegPage();
            $_SESSION["isAuthorised"]=true;
            $_SESSION["login"]=$login;
            $_SESSION["photo"] = $photo;
            $_SESSION["role"]="Customer";
            echo "<script>
                    alert('successfully registered');
                    location = 'index.php';
                    </script>";
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                
                $_SESSION["logregerror"] = "t";
                $_SESSION["loginformreg"] = $login;
                $_SESSION["emailformreg"] = $email;
                $_SESSION["passwordformreg"] = $passwrd;
                $_SESSION["confpasswordformreg"] = $confpasswrd;
                echo "<script>
                    location = document.URL;
                    </script>";
            } else {
                echo 'Ошибка MySQL: '.$e->getMessage();
            }
        }
    } else {
        // echo"<h1>Pass dont match</h1>";
        // echo "<script>
        //     document.getElementById('passerror').value ='t';
        //     document.getElementById('regForm').submit();
        // </script>";
        $_SESSION["passregerror"] = "t";
        $_SESSION["loginformreg"] = $login;
        $_SESSION["emailformreg"] = $email;
        $_SESSION["passwordformreg"] = $passwrd;
        $_SESSION["confpasswordformreg"] = $confpasswrd;
        echo "<script>
        location = document.URL;
                    </script>";
    }
} 
else {
?>
    <div class="container">
        <div class="row row-cols-2">
            <div class="col">
                <form method="POST" action="?page=5" id="regForm" enctype="multipart/form-data">
                    <div><label class="form-label">Login:
                            <? echo isset($_SESSION["logregerror"]) && $_SESSION["logregerror"] == "t" ? "<div style='color: red;'>The login is already taken</div>" : "" ?>
                            <input required name="login" type="text" value="<? 
                            echo isset($_SESSION["loginformreg"]) ? $_SESSION["loginformreg"] : "" ;
                            ?>" class="form-control"></label></div>
                    <div><label class="form-label">Email:<input required name="email" value="<? echo isset($_SESSION["emailformreg"]) ? $_SESSION["emailformreg"] : "" ?>" type="email" class="form-control"></label></div>

                    <div><label class="form-label">Password:
                            <? echo isset($_SESSION["passregerror"]) && $_SESSION["passregerror"] == "t" ? "<div style='color: red;'>Passwords doesn't match!</div>" : "" ?>
                            <input name="password" type="password" value="<? echo isset($_SESSION["passwordformreg"]) ? $_SESSION["passwordformreg"] : "" ?>" required class="form-control"></label></div>

                    <div>
                        <label class="form-label">Confirm password:
                            <? echo isset($_SESSION["passregerror"]) && $_SESSION["passregerror"] == "t" ? "<div style='color: red;'>Passwords doesn't match!</div>" : "" ?>
                            <input name="confpassword" type="password" value="<? echo isset($_SESSION["confpasswordformreg"]) ? $_SESSION["confpasswordformreg"] : "" ?>" required class="form-control"></label>
                    </div>
                    <div>
                        <label class="form-label">Select photo:
                            <input name="photo" accept="image/*" type="file" required class="form-control">
                        </label>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-success" name="register">Register</button>
                        <a class="btn btn-secondary" href="?page=4" name="logform">Log in</a>
                        
                    </div>
                </form>
                
            </div>
        </div>
    </div>
<?
}

?>