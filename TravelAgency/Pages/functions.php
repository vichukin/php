<?
function connect_To_DB($host,$username,$passwrd="",$dbname="agencydb",$port=3306): mysqli|bool{
    $connect = new mysqli($host,$username,$passwrd,$dbname,$port) or die("Could not connect to DB");
    if($connect)
        $connect->query("set names 'utf8'");
    return $connect;

}
function connect($host = "localhost:3306",$user = "root",$pass ="",$dbname="agencyDB"):PDO|bool
    {
        $cs = "mysql:host=$host;dbname=$dbname;charset=utf8";
        $options = array(
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"
        );
        try{
            $pdo = new PDO($cs,$user,$pass,$options);
            return $pdo;
        }
        catch(PDOException $exception)
        {
            echo $exception->getMessage();
            return false;
        }
    }
function unsetForRegPage(){
    unset($_SESSION["loginformreg"]);
    unset($_SESSION["emailformreg"]);
    unset($_SESSION["passwordformreg"]);
    unset($_SESSION["confpasswordformreg"]);   
}
function unsetRegErrors(){
    unset($_SESSION["logregerror"]);
    unset($_SESSION["passregerror"]);
}
function unsetLofErrors(){
    unset($_SESSION["loginError"]);
}
function unsetForLogin(){
    unset($_SESSION["loginform"]);
}
?>