<?
session_start();

echo "<div>From second page: ".$_SESSION["num1"]."</div>";
echo $_SERVER["PHP_SELF"];
?>
<a href="session1.php">Back</a>