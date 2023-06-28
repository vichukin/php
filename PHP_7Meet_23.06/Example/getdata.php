<?
// class Point{
//     public $x;
//     public $y;
//     function show(){
//         echo "<div>X = $this->x, Y = $this->y</div>";
//     }
//     function __construct($x, $y)
//     {
//         $this->x=$x;
//         $this->y=$y;
//     }
// }
include_once("point.php");
$str = file_get_contents("point1.json");
$p = json_decode($str);
var_dump($p);
echo"<hr>";
$str2 = file_get_contents("point1.txt");
$p2 =unserialize($str2);
var_dump($p2);
echo"<hr>";
$p2->show();
$p2();
echo"<hr>";
$p2->moveTo(50,50);
$p2->show();
$p2();
echo"<hr>";
$p2->moveBy(10,-20);
$p2->show();
$p2();
echo"<hr>";
// $p2->show();
// $p->show();
// echo $p->y;
?>