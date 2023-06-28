<?
$num1= 10;
$num2=100;
echo "Sum: ".($num1+$num2)."<br>";
echo "$num1 + $num2 = ".($num1+$num2)."<br>";
echo '$num1 + $num2 = '.($num1+$num2)."<br>";
$role="lox";
switch($role)
{
    case"admin":
        {
            echo "You are admin";
            break;
        }
    case "manager":
        {
            echo "You are manager";
            break;
        }
    default:
        {
            echo"I dont know who are you";
            break;
        }
        
}
echo "<br>";
$arr1 = array();
$arr1[0]="hello";
$arr1[1]="dear";
$arr1[2]="php";
$arr1[]="The best!";
echo "$arr1[0] $arr1[1] $arr1[2] $arr1[3]"."<br>";
$i=0;
$str="";
while($i<count($arr1))
{
    $str.=" ".$arr1[$i];
    $i++;
}
echo $str;
?>