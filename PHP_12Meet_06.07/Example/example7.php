<?
    include_once("functions.php");
    include_once("classes.php");
    $hotel1 = new Hotel("bla bla bla","bla bla",900,3,2);
    // $hotel1 = Hotel::intoDB($hotel1);
    $hotel2 = Hotel::fromDB(5);
    var_dump($hotel2);
?>