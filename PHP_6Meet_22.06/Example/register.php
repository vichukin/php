<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=x, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <?
        if(!isset($_POST["regUser"]))
        {
    ?>

    <form method="post" enctype="multipart/form-data">

        <div class="container">
            <div class="row">
                <div class="mb-3">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" name="fname">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Load Photo</label>
                    <input class="form-control" type="file" id="formFile" name="photo">
                </div>
                <input type="submit" class="btn btn-success" value="Register" name="regUser">
            </div>
        </div>
            
    </form>
    <?
        }
        else{
            if($_FILES&&$_FILES["photo"]["error"]===UPLOAD_ERR_OK){
            foreach($_FILES["photo"] as $key=>$val)
            {
                echo"<div>$key: $val</div>";
            }
            $filename = $_FILES["photo"]["name"];
            move_uploaded_file($_FILES["photo"]["tmp_name"],"images/".$filename);
            echo "<div style='color:greeb;'>file successfully uploaded</div>";
        }
            else{
                echo "<div style='color:red;'>Error while upload file</div>";
            }
        }
    ?>
</body>

</html>