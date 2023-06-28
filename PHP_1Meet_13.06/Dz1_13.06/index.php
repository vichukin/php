<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?
    $arr = array("red","green","blue","chocolate","pink","navy","aqua","azure","brown");
    $used = array();
    for($i=0;$i<4;$i++)
    {
        $rand = rand(0,8);
        while(in_array($arr[$rand],$used))
        {
            $rand = rand(0,8);
        }
        $col = $arr[$rand];
        $used[]=$col;
        echo "<div style='background-color: $col; width: 200px; height: 70px;' ></div>";
    }
?>
</body>
</html>