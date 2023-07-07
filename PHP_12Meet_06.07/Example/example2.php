<?
    include_once("functions.php");
    $pdo = connect($dbname="travels");
    $str = "Bread');Drop database travels;";
    $q1="INSERT INTO Products(Price,Quality,Title) VALUES (34,3,'$str')";
    $pdo->$q1;
?>