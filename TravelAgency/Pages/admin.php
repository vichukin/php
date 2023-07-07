<?
    include_once("functions.php");
?>
<div class="container">
<?
    if(isset($_SESSION["role"])&&$_SESSION["role"]=="Admin")
    {
        ?>
        
    <h2>admin panel</h2>
    <div class="row row-cols-2">
        <div class="col">
            <?
                include_once("Admin/countries.php");
            ?>
        </div>
        <div class="col">
            <?
                include_once("Admin/cities.php");
            ?>
        </div>
        <div class="col">
            <?
                include_once("Admin/hotels.php");
            ?>
        </div>
        <div class="col">
            <?
                include_once("Admin/users.php");
            ?>
        </div>
        <div class="col">
            <?
                include_once("Admin/images.php");
            ?>
        </div>
    </div>

        <?
    }
    else
    {
        echo "<div class='alert alert-danger'>This page for admin only!</div>";
    }
?>
</div>