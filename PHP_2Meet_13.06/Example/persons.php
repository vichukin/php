<?
    $persons["Vychkin"] = array("name"=>"Dmytro","surname"=>"Vychkin","position"=>"student");
    $persons["Ruban"] = array("name"=>"Serhii","surname"=>"Ruban","position"=>"Team lead");
    foreach($persons as $elem)
    {
        foreach($elem as $atr=>$value)
        echo "<div>$atr: $value</div>";
        echo "<hr>";
    }
?>