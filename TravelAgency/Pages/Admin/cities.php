<? if (isset($_SESSION["cityadderr"])) {
    echo "<div class='alert alert-warning'>" . $_SESSION["cityadderr"] . "</div>";
}
?>
<h4>Cities:</h4>
<table class="table table-striped mb-3">
    <thead>
        <tr>
            <th>Id</th>
            <th>City name</th>
            <th>Country</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?
        $connect = connect_To_DB("localhost", "root");
        $query4 = "SELECT Ci.Id,Ci.City,C.Country FROM Cities Ci LEFT JOIN Countries C on Ci.CountryId=C.Id";
        $res = $connect->query($query4);
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
                echo "<td><input type='checkbox' class='form-check-input' name='delcities[]' form='cityform' value='" . $row[0] . "'/></td>";

                ?>
            </tr>
        <?
        }
        $res->free();
        ?>
    </tbody>
</table>
<form method="POST" id="cityform" >
    <div class="mb-3">
        <select required class="form-select" name="CountryId">
            <option value="0" selected>Choose country</option>
            <?
            $query5 = "SELECT * FROM Countries";
            $res = $connect->query($query5);
            while ($row = $res->fetch_array(MYSQLI_NUM)) {
                echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">

        <label for="cityname" class="form-label">City name:</label>
        <input type="text" class="form-control" name="cityname" id="cityname" placeholder="Add new city...">
    </div>
    <button class="btn btn-sm btn-success" name="addcity">Add</button>
    <button class="btn btn-sm btn-warning" name="deletecity">Delete</button>
</form>
<?
if (isset($_POST["addcity"])) {
    if ($_POST["CountryId"] != 0) {
        $cityname = $_POST["cityname"];
        $countryid = $_POST["CountryId"];

        $query6 = "INSERT INTO Cities(`City`, `CountryId`) VALUES ('$cityname','$countryid')";
        $res = $connect->query($query6);
        if ($connect->errno) {
            $_SESSION["cityadderr"] = "Error when adding city!";
        } else {
            unset($_SESSION["cityadderr"]);
            echo "<script>
                        location = document.URL;
                        </script>";
        }
        $res->free();
        
    } else {
        $_SESSION["cityadderr"] = "Error when adding city! Unknown city!";
        echo "<script>
                        location = document.URL;
                        </script>";
    }
}
if (isset($_POST["deletecity"])) {
    $delcountries = $_POST["delcities"];
    $count = count($delcountries);
    foreach ($delcountries as $id) {
        $query7 = "DELETE FROM Cities WHERE Id=$id";
        $connect->query($query7);
    }
    echo "<script>
                        alert('$count cities was deleted');
                        location = document.URL;
                        </script>";
}
?>