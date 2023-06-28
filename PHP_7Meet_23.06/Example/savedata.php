<?
 include ("point.php");
 $p1=new Point(100,200);
 $str = json_encode($p1);
 $str2 = serialize($p1);
 file_put_contents("point1.json",$str);
 file_put_contents("point1.txt",$str2);
 $p1->show();
 echo "<div>File was saved</div>";
?>