<?
function connect_To_DB($host,$username,$passwrd="",$dbname="agencydb",$port=3306): mysqli|bool{
    $connect = new mysqli($host,$username,$passwrd,$dbname,$port) or die("Could not connect to DB");
    if($connect)
        $connect->query("set names 'utf8'");
    return $connect;

}
?>