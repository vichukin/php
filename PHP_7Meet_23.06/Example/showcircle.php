<?
include_once("circle.php");
$circle = new Circle(10,20,5);
echo "circle radius: $circle->x";
$circle->show();
$circle->radius = 10;
$circle->show();
$radiusexist = isset($circle->radius);
echo "<div style='color:".($radiusexist?"green":"red").";'>".($radiusexist?"exist":"not exist")."</div>";
?>