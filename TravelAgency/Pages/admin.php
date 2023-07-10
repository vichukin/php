<?
    include_once("functions.php");
?>
<div class="container">
<?
    if(isset($_POST["getadmin"]))
    {
        $_SESSION["role"] = "Admin";
    }
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
    else if(!isset($_SESSION["isAuthorised"]))
    {
        echo "<div class='alert alert-danger'>You need to beauthorised! <a href='?page=4' class='btn btn-sm btn-secondary'> Authorise </a></div>";
    }
    else
    {
        echo "<div class='alert alert-danger'>This page for admin only! <form method='POST'><button class='btn btn-sm btn-secondary' name='getadmin'>Temporarily get admin role</button></form></div>";
    }
?>
</div>