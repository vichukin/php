<?
    include_once("../functions.php");
    if(isset($_POST["getcities"]))
    {
        $countryid = $_POST["getcities"];
        $connect= connect_To_DB("localhost","root");
        // echo $countryid;
    $query = "SELECT Ci.Id,Ci.City FROM Cities Ci  LEFT JOIN Countries C on Ci.CountryId=C.Id where Ci.CountryId = $countryid";
    $res = $connect->query($query);
    while ($row = $res->fetch_array(MYSQLI_NUM)) {
        echo "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
    }
    }
?>