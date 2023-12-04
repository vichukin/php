<?
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql = connect_To_DB("localhost","root","");
        $res = $sql->query("SELECT * FROM Hotels where Id=$id");
        $elem = $res->fetch_array();
        if($elem!=NULL)
        {
            ?>
                <div class="row row-cols-4">
                    <?
                        $res = $sql->query("SELECT * FROM Images Where HotelId = $id");
                        while($row = $res->fetch_array())
                        {
                            ?>
                                <div class="col">
                                    <img src="<?echo $row['ImagePath']?>" alt="houseimg" class="w-100">
                                </div>
                            <?
                        }
                    ?>
                </div>
                <div class="row">
                    <!-- Description: -->
                </div>
                <div class="row">
                    <!-- Comments -->
                    
                </div>
            <?
        }
        else
        echo "<script>
                    location = 'index.php';
                    </script>";
    }
    else
    {
        echo "<script>
                    location = 'index.php';
                    </script>";
    }
?>