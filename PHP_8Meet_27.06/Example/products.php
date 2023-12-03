<?
    $link = mysqli_connect("localhost","root","","shopDB",3306);
    if(isset($_POST["products"]))
    {
        $arr = $_POST["products"];
        foreach($arr as $elem)
        {
            mysqli_query($link,"delete from Products where id = $elem");
        }
        echo "<script>window.location.href = '/PHP_8Meet_27.06/Example';</script>";
    }
?>
<h2>Products</h2>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Quantity</th>
                <th><form method="POST" id="deleteForm"><button name="delete" class="btn btn-outline-danger w-100">delete selected</button></form></th>
            </tr>
        </thead>
        <tbody>
            <?

            
            $query = "SELECT * FROM `Products`;";
            $res = mysqli_query($link,$query);
            
            while($arr = mysqli_fetch_array($res, MYSQLI_ASSOC))
            {
                ?>
                <tr>
                    <?
                    foreach($arr as $elem)
                    {
                    ?>
                    <td>
                        <?
                        echo $elem;
                        ?>
                    </td>
                    <?
                    }
                    ?>
                    <td class="w-100 d-flex" ><a href="?page=3&id=<?echo $arr['id']?>" class=" btn btn-outline-warning w-25">Edit</a><input class=" m-auto d-block" type="checkbox" form="deleteForm" name="products[]" value="<?echo $arr['id']?>"></td>
                </tr>
                <?
            }
            
            ?>
        </tbody>
    </table>