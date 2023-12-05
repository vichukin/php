<?
    if(isset($_POST["content"]))
    {
        $content = $_POST["content"];
        $hotel = $_POST["hotel"];
        $userLogin = $_POST["user"];
        $userId = getUserIdByLogin($userLogin);
        $comment = new Comment($userId,$hotel,$content);
        Comment::intoDB($comment);
        echo "<script>
                        location = document.URL;
                        </script>";
    }
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $sql = connect_To_DB("localhost","root","");
        $res = $sql->query("SELECT H.Id,H.HotelName,H.Description, H.Price, H.Stars, C.Country,Ci.City FROM Hotels H LEFT JOIN Cities Ci on H.CityId=Ci.Id LEFT JOIN Countries C on Ci.CountryId=C.Id where H.Id=$id");
        $elem = $res->fetch_array();
        
        if($elem!=NULL)
        {
            ?>
                <div class="container">
                <div class="row mt-4">
                    <h2><?echo $elem['HotelName']?></h2>
                    <p><?echo "$elem[5], $elem[6]"?></p>
                    <hr>
                </div>
                <div class="row row-cols-4">
                    <?
                        $res = $sql->query("SELECT * FROM Images Where HotelId = $id");
                        $notExists = true;
                        while($row = $res->fetch_array())
                        {
                            $notExists=false;
                            ?>
                                <div class="col">
                                    <img src="<?echo $row['ImagePath']?>" alt="houseimg" class="w-100">
                                </div>
                            <?
                        }
                        if($notExists)
                            {
                                ?>
                                <div class="col">
                                    <img src="Images/nf.jpg" alt="houseimg" class="w-100">
                                </div>
                                <?
                            }
                    ?>
                </div>
                <hr>
                <div class="row">
                    <h3>Description:</h3>
                    <p><?echo $elem['Description']?></p>
                </div>
                <div class="row">
                    <?
                        $ar = Comment::fromDBAllByHotelId($elem['Id']);
                        if($ar!=[])
                        {
                            ?>
                            <hr>
                            <h3>Comments:</h3>
                                <div class="ms-3">
                                <?
                                    foreach($ar as $comment)
                                    {
                                        ?>
                                        <div style="box-shadow: 0px 0px 5px 0px rgba(148, 146, 146, 1);" class="p-3 mb-2">
                                            <h5 class="m-0"><?echo $comment->User?>:</h5>
                                            <p class="m-0"><?echo $comment->Content?></p>
                                        </div>
                                        <?
                                    }
                                ?>
                                </div>
                            <?
                        }
                    ?>
                    
                </div>
                <div>
                        <hr>
                        <h3>Leave your comment:</h3>
                        <?
                            if(isset($_SESSION["isAuthorised"]))
                            {
                                ?>
                                <form method="POST">
                                    <input type="hidden" name="hotel" value="<?echo $elem['Id']?>">
                                    <input type="hidden" name="user" value="<?echo $_SESSION['login']?>">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Comments</label>
                                </div>
                                <button class="btn btn-outline-primary">Write</button>
                                </form>
                                <?
                            }
                            else
                            {
                                ?>
                                <div class="alert alert-danger">You need to be authorised!</div>
                                <?
                            }
                        ?>
                </div>
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