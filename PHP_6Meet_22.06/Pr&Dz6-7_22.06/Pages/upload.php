<?
if(isset($_SESSION["isAuthorised"]))
{
    if(isset($_POST["upload"]))
    {
        $title = $_POST["title"];
        var_dump($_FILES["photo"]);
        $image = new Image($title,"Gallery/".$_FILES["photo"]["name"],$_SESSION["login"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"],"Gallery/".$_FILES["photo"]["name"]);
        $file = fopen("Files/Images.json","a");
        $str = serialize($image);
        fwrite($file,$str."\n");
        fclose($file);
        echo "<script>
        location = 'index.php';
        </script>";
    }
?>
<form method="POST" enctype="multipart/form-data">
    <div><label  class="form-label">Title:<input type="text" name="title" class="form-control"></label></div>
    <div><label class="form-label">Choose photo: <input name="photo" accept="image/*" type="file" required class="form-control"></label></div>
    <button class="btn btn-success" name="upload">Upload</button>
</form>
<?
}
else
{
    echo "<div class='alert alert-danger'>You need to be authorised! <a href='?page=3' class='btn btn-sm btn-secondary'> Authorise </a></div>";
}
?>