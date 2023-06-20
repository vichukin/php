<?
session_start();
$_SESSION["num1"] = 100;
$num1=$_SESSION["num1"];
echo "<div>From first file: $num1</div>";

?>
<a href="session2.php">Second File</a>