<div class="container">
    <h2></h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
        <?
        include_once("functions.php");
        $connect = connect_To_DB("localhost", "root");
        $q = "SELECT H.Id,H.HotelName,H.Description, H.Price, H.Stars, C.Country,Ci.City FROM Hotels H LEFT JOIN Cities Ci on H.CityId=Ci.Id LEFT JOIN Countries C on Ci.CountryId=C.Id";
        $res = $connect->query($q);
        if ($connect->errno) {
            echo "<div class='alert alert-warning'>$err</div>";
        }

        while ($row = $res->fetch_array(MYSQLI_NUM)) {
            $q1 = "SELECT I.ImagePath FROM Hotels H left join Images I on I.HotelId=H.Id where H.Id=$row[0] LIMIT 1";
            $imgres = $connect->query($q1);
            $imgrow = $imgres->fetch_array(MYSQLI_NUM);
            $imgpath = $imgrow[0];
            
        ?>
            <div class="card mb-3">
            <img src="<?echo $imgpath==""?"Images/nf.jpg":"$imgpath"?>" style='object-fit: cover; width: 100%;height: 25vh;' class="card-img-top" alt="photo">
            <div class="card-body">
                <h5 class="card-title"><?echo $row[1]?></h5>
                <p class="card-text"><?echo $row[2]?></p>
                <p class="card-text"><small class="text-body-secondary"><?echo $row[6]?>,<?echo $row[5]?></small></p>
                <a href="?page=6&id=<?echo $row[0]?>" class="btn btn-otline-primary">Details</a>
            </div>
            </div>
        <?
        }
        $res->free();
        ?>
        
    </div>
</div>