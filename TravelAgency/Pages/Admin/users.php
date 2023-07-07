<? if (isset($_SESSION["usererr"])) {
    echo "<div class='alert alert-warning'>" . $_SESSION["usererr"] . "</div>";
}
?>
<h4>Users:</h4>
<table class="table table-striped mb-3">
    <thead>
        <tr>
            <th>Id</th>
            <th>Login</th>
            <th>Email</th>
            <th>Photo</th>
            <th>Discount</th>
            <th>Role</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?
        $connect = connect_To_DB("localhost", "root");
        $q1 = "SELECT U.Id,U.Login,U.Email,U.Photo,U.Discount,R.RoleName FROM Users U left join Roles R on U.RoleId=R.Id";
        $res = $connect->query($q1);
        if ($connect->errno) {
            echo "<div class='alert alert-warning'>$err</div>";
        }
        // var_dump($res->fetch_array(MYSQLI_NUM));
        // $row = $res->fetch_array(MYSQLI_NUM);
        // var_dump($row);
        while ($row = $res->fetch_array(MYSQLI_NUM)) {
        ?>
            <tr>
                <?
                $counter = 0;
                foreach ($row as $elem) {
                    if ($counter == 3) {
                        echo "<td><img class='w-50' src='data:image/png;base64," . $elem . "'/></td>";
                    } else
                        echo "<td>$elem</td>";
                    $counter++;
                }
                echo "<td><input type='checkbox' class='form-check-input' name='delusers[]' form='userform' value='" . $row[0] . "'/></td>";
                ?>
            </tr>
        <?
        }
        $res->free();
        ?>
    </tbody>
</table>
<form method="POST" id="userform" enctype="multipart/form-data">

    <div class="mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" name="login" id="login" placeholder="Add new login...">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Add new email...">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Add new password...">
    </div>
    <div class="mb-3">
        <label for="discount" class="form-label">Discount</label>
        <input type="number" class="form-control" name="discount" id="discount" placeholder="Add new discount...">
    </div>
    <div class="mb-3">
        <select required class="form-select" name="roleid">
            <option value="0" selected>Choose role</option>
            <?
            $q2 = "SELECT * FROM Roles";
            $res = $connect->query($q2);
            while ($row = $res->fetch_array(MYSQLI_NUM)) {
                echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
            }
            ?>
        </select>
    </div>

    <div>
        <label class="form-label">Select photo:
            <input name="photo" accept="image/*" type="file" class="form-control">
        </label>
    </div>

    <button class="btn btn-sm btn-success" name="adduser">Add</button>
    <button class="btn btn-sm btn-warning" name="deleteuser">Delete</button>
</form>
<?
if (isset($_POST["adduser"])) {
    $roleid = $_POST["roleid"];
    $login = $_POST["login"];
    $email = $_POST["email"];
    $passwrd = $_POST["password"];
    $discount = $_POST["discount"];
    $photo = base64_encode(file_get_contents($_FILES["photo"]["tmp_name"]));
    if ($roleid == 0) {
        $_SESSION["usererr"] = "Error when adding user! Unknown role!";
    } else {
        $pass = password_hash($passwrd, PASSWORD_DEFAULT);
        $q3 = "INSERT INTO `Users`( `Login`, `Email`, `Passwrd`,`Photo`, `Discount`, `RoleId`) VALUES ('$login','$email','$pass','$photo','$discount','$roleid')";
        $res = $connect->query($q3);
        if ($connect->errno) {
            $_SESSION["usererr"] = "Error when adding country!";
        } else {
            unset($_SESSION["usererr"]);
            echo "<script>
                        location = document.URL;
                        </script>";
        }
        $res->free();
    }
}
if (isset($_POST["deleteuser"])) {
    $delusers = $_POST["delusers"];
    $count = count($delusers);
    foreach ($delusers as $id) {
        $q4 = "DELETE FROM Users WHERE id=$id";
        $connect->query($q4);
    }
    echo "<script>
                        alert('$count users was deleted');
                        location = document.URL;
                        </script>";
}
?>