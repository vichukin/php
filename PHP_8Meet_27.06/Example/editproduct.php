<?
    if(isset($_POST["edit"]))
    {
        $id = $_POST["id"];
        $title = $_POST["title"];
        $quantity = $_POST["quantity"];
        $link = mysqli_connect("localhost","root","","shopDB",3306);
        $res = mysqli_query($link,"UPDATE `Products` SET Title='$title',Quantity='$quantity' WHERE id = $id");
        echo "<script>window.location.href = '/PHP_8Meet_27.06/Example';</script>";
    }
    if(isset($_GET["id"]))
    {
        $id=$_GET["id"];
        $link = mysqli_connect("localhost","root","","shopDB",3306);
        $res = mysqli_query($link,"Select * from Products where id=$id");
        $elem = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if($elem!=NULL)
        {
        ?>
    
    
                <div class="col col-4"></div>
                <div class="col col-4">
                <h2 class="text-center">Edit</h2>
                <hr>
                    <form method="POST">
                    <input type="hidden" value="<?echo $elem['id']?>" name="id">
                    <div class="mb-3"><label for="title" class="form-label">Write title of product</label><input value="<?echo $elem['Title']?>" type="text" name="title" id="title" class="form-control" required>
                    <div class="mb-3"><label for="quantity" class="form-label">Write quantity of Products</label><input value="<?echo $elem['Quantity']?>" type="number" min="1" name="quantity" id="quantity" required class="form-control"></div>
                    <button name="edit" class="btn btn-success w-100">Edit product</button>
                    </form>
                </div>
                <div class="col col-4"></div>
                </div>
    
        <?
        }
        else
            echo "<script>window.location.href = '/PHP_8Meet_27.06/Example';</script>";
    }
    else
        echo "<script>window.location.href = '/PHP_8Meet_27.06/Example';</script>";

    
    
?>
