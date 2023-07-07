<?
function connect_To_DB($host,$username,$passwrd="",$dbname="agencydb",$port=3306): mysqli|bool{
    $connect = new mysqli($host,$username,$passwrd,$dbname,$port) or die("Could not connect to DB");
    if($connect)
        $connect->query("set names 'utf8'");
    return $connect;

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