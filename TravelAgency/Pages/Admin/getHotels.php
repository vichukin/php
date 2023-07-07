<?
    include_once("../functions.php");
    if(isset($_POST["gethotels"]))
    {
        $cityid = $_POST["gethotels"];
        $connect= connect_To_DB("localhost","root");
        // echo $countryid;
    $query = "SELECT H.Id,H.HotelName FROM Hotels H  LEFT JOIN Cities Ci on H.CityId=Ci.Id where Ci.Id = $cityid";
    $res = $connect->query($query);
    while ($row = $res->fetch_array(MYSQLI_NUM)) {
        echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
    }
    }
?>