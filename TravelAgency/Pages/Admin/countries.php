<? if (isset($_SESSION["countryadderr"])) {
    echo "<div class='alert alert-warning'>" . $_SESSION["countryadderr"] . "</div>";
}
?>
<table class="table table-striped mb-3">
    <thead>
        <tr>
            <th>Id</th>
            <th>Country name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?
        $connect = connect_To_DB("localhost", "root");
        $query1 = "SELECT * FROM Countries";
        $res = $connect->query($query1);
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
                foreach ($row as $elem)
                    echo "<td>$elem</td>";
                echo "<td><input type='checkbox' class='form-check-input' name='delcountries[]' form='countryform' value='" . $row[0] . "'/></td>";

                ?>
            </tr>
        <?
        }
        $res->free();
        ?>
    </tbody>
</table>
<form method="POST" id="countryform">

    <div class="mb-3">
        <label for="countryname" class="form-label">Country name:</label>
        <input type="text" class="form-control" name="countryname" id="countryname" placeholder="Add new country...">
    </div>
    <button class="btn btn-sm btn-success" name="addcountry">Add</button>
    <button class="btn btn-sm btn-warning" name="deletecountry">Delete</button>
</form>
<?
if (isset($_POST["addcountry"])) {
    $countryname = $_POST["countryname"];
    $query2 = "INSERT INTO Countries(Country) VALUES ('$countryname')";
    $res = $connect->query($query2);
    if ($connect->errno) {
        $_SESSION["countryadderr"] = "Error when adding country!";
    } else {
        unset($_SESSION["countryadderr"]);
        echo "<script>
                        location = document.URL;
                        </script>";
    }
    $res->free();
}
if (isset($_POST["deletecountry"])) {
    $delcountries = $_POST["delcountries"];
    $count = count($delcountries);
    foreach ($delcountries as $id) {
        $query3 = "DELETE FROM Countries WHERE id=$id";
        $connect->query($query3);
    }
    echo "<script>
                        alert('$count countries was deleted');
                        location = document.URL;
                        </script>";
}
?>