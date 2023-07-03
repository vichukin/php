<? include_once("Car.php"); ?>
<div class="row">
    <div class="col">
        <form method="post">
            <div><label for="Manufacturer" class="form-label">Manufacturer:<input type="text" required name="Manufacturer" id="Manufacturer" class="form-control"></label></div>
            <div><label for="Model" class="form-label">Model:<input type="text" name="Model" required id="Model" class="form-control"></label></div>
            <div><label for="Price" class="form-label">Price:<input type="number" name="Price" required id="Price" class="form-control"></label></div>
            <button class="btn btn-success">Add car</button>
            <?
            if (isset($_POST["Manufacturer"])) {
                $car = new Car($_POST["Manufacturer"], $_POST["Model"], $_POST["Price"]);
                if(file_exists("Cars.json"))
                {
                    $file = fopen("Cars.json", "r");
                    $arr = array();
                    while ($str = fgets($file)) {
                        $arr[] = unserialize($str);
                    }
                    fclose($file);
                    $isexist = false;
                    foreach ($arr as $elem) {
                        if ($elem->Model == $car->Model) {
                            $isexist = true;
                            break;
                        }
                    }
                    if ($isexist) {
                        echo "<script>alert('This model already exist');</script>";
                    } else {
                        $file = fopen("Cars.json", "a");
                        $str=serialize($car);
                        fwrite($file,$str."\n");
                        fclose($file);
                    }
                }
                else
                {
                    $str=serialize($car);
                    file_put_contents("Cars.json",$str."\n");
                }
            }
            ?>
        </form>
    </div>
</div>