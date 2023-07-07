<? if (isset($_SESSION["hotelerr"])) {
    echo "<div class='alert alert-warning'>" . $_SESSION["hotelerr"] . "</div>";
}
?>
<h4>Hotels:</h4>
<table class="table table-striped mb-3">
    <thead>
        <tr>
            <th>Id</th>
            <th>Hotel name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Stars</th>
            <th>Country</th>
            <th>City</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?
        $connect = connect_To_DB("localhost", "root");
        $query8 = "SELECT H.Id,H.HotelName,H.Description, H.Price, H.Stars, C.Country,Ci.City FROM Hotels H LEFT JOIN Cities Ci on H.CityId=Ci.Id LEFT JOIN Countries C on Ci.CountryId=C.Id";
        $res = $connect->query($query8);
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
                echo "<td><input type='checkbox' class='form-check-input' name='delhotels[]' form='hotelform' value='" . $row[0] . "'/></td>";

                ?>
            </tr>
        <?
        }
        $res->free();
        ?>
    </tbody>
</table>
<form method="POST" id="hotelform">
    <div class="mb-3">
        <select required class="form-select" name="CountryId" id="hotco">
            <option value="0" selected>Choose country</option>
            <?
            $query9 = "SELECT * FROM Countries";
            $res = $connect->query($query9);
            while ($row = $res->fetch_array(MYSQLI_NUM)) {
                echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
            }
            ?>
        </select>
        <select required class="form-select" disabled name="CityId" id="hotci">
            <option value="0" selected>Choose city</option>
        </select>
    </div>
    <div class="mb-3">

        <label for="hotelname" class="form-label">Hotel name:</label>
        <input type="text" class="form-control" name="hotelname" id="hotelname" placeholder="Add new hotel...">
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Write description for hotel" name="description" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Description</label>
    </div>
    
    <div class=" mb-3">
        <label class="form-label" for="price">Price:</label>
        <!-- <span class="input-group-text">$</span> -->
        <input type="number" min="0" class="form-control" name="price" aria-label="Amount (to the nearest dollar)">
        <!-- <span class="input-group-text">.00</span> -->
    </div>
    <div>
        <style>
            .checked {
                color: orange;
            }

            .fa {
                margin: 0;
            }

            .fa-star:hover {
                color: orange;
                cursor: pointer;
            }

            #stars {
                width: max-content;
                height: max-content;
            }
        </style>

        <label class="form-label m-0">Star Rating:</label>
        <div id="stars">
            <input type="text" name="stars" id="selstars" hidden value="0">
            <p class="fa fa-star" id="star1"></p>
            <p class="fa fa-star" id="star2"></p>
            <p class="fa fa-star" id="star3"></p>
            <p class="fa fa-star" id="star4"></p>
            <p class="fa fa-star" id="star5"></p>

        </div>
    </div>
    <button class="btn btn-sm btn-success" name="addhotel">Add</button>
    <button class="btn btn-sm btn-warning" name="deletehotel">Delete</button>
</form>
<?
if (isset($_POST["addhotel"])) {
    if ($_POST["CityId"] != 0) {
        $hotelname = $_POST["hotelname"];
        $countryid = $_POST["CountryId"];
        $cityid = $_POST["CityId"];
        $stars = $_POST['stars'];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $query10 = "INSERT INTO `Hotels`( `HotelName`, `Description`, `Price`, `Stars`, `CityId`) VALUES ('$hotelname','$description','$price','$stars','$cityid')";
        $res = $connect->query($query10);
        if ($connect->errno) {
            $_SESSION["hotelerr"] = "Error when adding hotels!";
        } else {
            unset($_SESSION["hotelerr"]);
            echo "<script>
                        location = document.URL;
                        </script>";
        }
        $res->free();
    } else {
        $_SESSION["hotelerr"] = "Error when adding hotels! Unknown City!";
        echo "<script>
                        location = document.URL;
                        </script>";
    }
}
if (isset($_POST["deletehotel"])) {
    $delcountries = $_POST["delhotels"];
    $count = count($delcountries);
    foreach ($delcountries as $id) {
        $query11 = "DELETE FROM Hotels WHERE Id=$id";
        $connect->query($query11);
    }
    echo "<script>
                        alert('$count hotels was deleted');
                        location = document.URL;
                        </script>";
}
?>
<script src="Scripts/hotels.js">
   
    
</script>