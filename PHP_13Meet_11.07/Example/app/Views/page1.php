<h2><?echo $title?></h2>
<?echo $text?>
<?
    echo "<ul>";
    foreach($countries as $country)
    {
        ?>
        <li><?echo $country?></li>
        <?
    }
    echo"</ul>";
?>