<? include_once("Car.php"); ?>
<div class="container">
    <h2>Cars</h2>
    <div class="row ">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Manufacturer</th>
                        <th>Model</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    if (file_exists("Cars.json")) {
                        $file = fopen("Cars.json", "r");
                        $arr = array();
                        while (!feof($file)) {
                            $str = fgets($file);
                            $car =unserialize($str);
                            if($car)
                                $arr[] = $car;
                            // var_dump($car);
                            
                        }
                        fclose($file);
                        foreach($arr as $elem)
                        {
                            ?>
                            <tr>
                                <?
                                    foreach($elem as $val)
                                        echo "<td>".$val."</td>";
                                ?>
                            </tr>
                            <?
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>