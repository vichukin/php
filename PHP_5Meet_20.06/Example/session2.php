<?
session_start();

echo "<div>From second page: ".$_SESSION["num1"]."</div>";

?>
<a href="session1.php">Back</a>