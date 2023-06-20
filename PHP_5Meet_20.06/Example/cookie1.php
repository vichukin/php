<?
setcookie("name","Vychkin Dmytro",time()+60*60*10,"/","",0,0);
setcookie("volume","1",time()-60*10,"/","",0,0);
if(isset($_COOKIE["volume"]))
{
    setcookie("name","Vychkin Dmytro",time()+60*60*10,"/","",0,0);
    setcookie("volume","1",time()+60*10,"/","",0,0);
}
$_COOKIE["volume"] =$_COOKIE["volume"]+1;
echo "<div>Volume: ".$_COOKIE["volume"]."</div>";
setcookie("volume",$_COOKIE["volume"],time()+60*10,"/","",0,0);
?>
<a href="cookie1.php">GO!</a>