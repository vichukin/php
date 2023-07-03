<?
    include_once("functions.php");
?>
<div class="container">
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
    </div>
</div>