<? if (isset($_SESSION["imgerr"])) {
    echo "<div class='alert alert-warning'>" . $_SESSION["imgerr"] . "</div>";
}
?>
<h4>Images:</h4>
<table class="table table-striped mb-3">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>HotelName</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?
        $connect = connect_To_DB("localhost", "root");
        $q5 = "SELECT I.Id,I.ImagePath,H.HotelName FROM Images I LEFT JOIN Hotels H on I.HotelId=H.Id";
        $res = $connect->query($q5);
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
                echo "<td><input type='checkbox' class='form-check-input' name='delimages[]' form='imageform' value='" . $row[0] . "'/></td>";

                ?>
            </tr>
        <?
        }
        $res->free();
        ?>
    </tbody>
</table>
<form method="POST" id="imageform" enctype="multipart/form-data">
    <div class="mb-3">
        <select required class="form-select" name="CountryId" id="imgco">
            <option value="0" selected>Choose country</option>
            <?
            $q6 = "SELECT * FROM Countries";
            $res = $connect->query($q6);
            while ($row = $res->fetch_array(MYSQLI_NUM)) {
                echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
            }
            $res->free();
            ?>
        </select>
        <select required class="form-select" disabled name="CityId" id="imgci">
            <option value="0" selected>Choose city</option>
        </select>
        <select required class="form-select" disabled name="HotelId" id="imghot">
            <option value="0" selected>Choose city</option>
        </select>
    </div>
    <div><label  class="form-label">Choose images: <input accept="image/*" type="file" name="images[]" multiple class="form-control"></label></div>
    <button class="btn btn-sm btn-success" name="addimage">Add</button>
    <button class="btn btn-sm btn-warning" name="deleteimage">Delete</button>
</form>
<?
if (isset($_POST["addimage"])) {
    if ($_POST["HotelId"] != 0) {
        $hotelid = $_POST["HotelId"];
        foreach($_FILES["images"]["name"] as $key=>$val)
        {
            if($_FILES["images"]["error"][$key]!=0)
            {
                echo "<script>alert('upload file error: $val')</script";
                continue;
            }
            if(move_uploaded_file($_FILES["images"]["tmp_name"][$key],"Images/$val"))
            {
                $q7= "INSERT INTO `Images`(`ImagePath`,`HotelId`) VALUES ('Images/$val','$hotelid')";
                $res = $connect->query($q7);
                if ($connect->errno) {
                    $_SESSION["imgerr"] = "Error when adding image!";
                    continue;
                } 
                // $res->free();
            }
        }
                    echo "<script>
                                location = document.URL;
                                </script>";
        
    } else {
        $_SESSION["imgerr"] = "Error when adding image! Unknown hotel!";
        echo "<script>
                        location = document.URL;
                        </script>";
    }
}
if (isset($_POST["deleteimage"])) {
    $delcountries = $_POST["delimages"];
    $count = count($delcountries);
    foreach ($delcountries as $id) {
        $q8 = "SELECT I.ImagePath from Images I where Id=$id";
        $res = $connect->query($q8);
        $row = $res->fetch_array(MYSQLI_NUM);
        if(unlink($row[0]))
        {
            $q8 = "DELETE FROM Images WHERE Id=$id";
            $connect->query($q8);
        }
    }
    echo "<script>
                        alert('$count images was deleted');
                        location = document.URL;
                        </script>";
}
?>
<script>
    getCities("imgci","imgco","imghot");
    getHotels("imghot","imgci");
</script>