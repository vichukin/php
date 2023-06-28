<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td:first-child{
            font-weight: bold;
            background-color: rgb(200,200,200);
        }
        th{
            background-color: rgb(200,200,200);
        }
        td{
            background-color: rgb(235,235,235);
        }
        table,td,th{
            border: 2px solid;
            border-collapse:collapse;
        }
        td,th{
            padding: 15px;
        }
    </style>
</head>
<body>
    <div>
        <div>
            <h2>First:</h1>
            <?
                $cars["lamborghini"] = array("manufacturer"=>"lamborghini","model"=>"Countach LPI 800-4","price"=>"$2.64million","year"=>"2022");
                $cars["BMW"] = array("manufacturer"=>"BMW","model"=>"X7","price"=>"$74,900","year"=>"2022");
                $cars["volkswagen"] = array("manufacturer"=>"volkswagen","model"=>"Atlas","price"=>"$35,150","year"=>"2021");
                $index=1;
                foreach($cars as $car)
                {
                    echo"<h4>Cars #$index</h4>";
                    foreach($car as $key=>$value)
                    {
                        echo "<h5>$key: $value</h5>";
                    }
                    $index++;
                }
            ?>
            <hr>
            <h2>Second:</h2>
            <?
                $arr=array(1,2,3,4,5,6,7,8,9,10);
                echo"<table><thead><tr>";
                foreach($arr as $elem)
                {
                    echo"<th>$elem</th>";
                }
                echo"</tr></thead><tbody>";
                foreach($arr as $row)
                {
                    if($row==1)
                        continue;
                    echo"<tr><td>$row</td>";
                    foreach($arr as $col)
                    {
                        if($row==1||$col==1)
                            continue;
                        echo "<td>".($row*$col)."</td>";
                    }
                    echo"</tr>";
                }
                echo"</tbody></table>";
            ?>
        </div>
    </div>
</body>
</html>