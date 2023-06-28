<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td{
            padding: 10px;
            background-color: rgb(230,230,230);
            font-weight: bold;
        } 
        th{
            padding: 10px;
            background-color: rgb(220,220,220);
        }
        td,th,tr{
            border: 2px solid black;
        }
        table{
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?
    if(isset($_POST["month"]))
    {
        date_default_timezone_set('Europe/Warsaw');
        $date = new DateTimeImmutable();
        $year = $date->format("o");
        $month = $_POST["month"];
        $date = new DateTimeImmutable("1.$month.$year");
        echo "<h1>Calendar for ".$date->format("F")."</h1>";
        $daysinmonth =$date->format("t");
        $numberofday =$date->format("N");
        $countofnonmonthdays = 0;
        if($numberofday!=1)
        {
            $countofnonmonthdays = $numberofday-1;
            $date=$date->sub(new DateInterval("P$countofnonmonthdays"."D"));
        }
        
        ?>
        <table>
            <thead>
                <tr>
                    <th>Пн</th>
                    <th>Вт</th>
                    <th>Ср</th>
                    <th>Чт</th>
                    <th>Пт</th>
                    <th>Сб</th>
                    <th>Вс</th>
                </tr>
            </thead>
            <tbody>
                <?
                    $weeks = ($daysinmonth+ $countofnonmonthdays)/7;
                    $weeks = is_int($weeks)?$weeks:$weeks+1;
                    for($i=0;$i<(intval($weeks)>=5?intval($weeks):5);$i++)
                    {
                        ?>
                        <tr>
                        <?
                            for($j=0;$j<7;$j++)
                            {   
                                
                                $text = $date->format("d");
                                $isthismonth = $date->format("n")==$month;
                                if($isthismonth)
                                    echo "<td>$text</td>";
                                else
                                    echo "<td style='color:rgb(150,150,150)'>$text</td>";
                                $date = $date->add(new DateInterval("P1D"));
                            }
                        ?>
                        </tr>
                        <?
                    }
                ?>
            </tbody>
        </table>
        <?
    }
    else
    {
        ?>
        <form method="POST">
            <div><label for="month">Enter month: <input required min="1" max="12" type="number" name="month" ></label></div>
            <button>Get calendar</button>
        </form>
        <?
    }
    
    ?>
</body>

</html>