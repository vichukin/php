<?
    include_once("functions.php");
    $pdo = connect();
    // $ps1 = $pdo->prepare("INSERT Countries(`Country`) VALUES(?)");
    // $country = "French";
    // $ps1->bindParam(1, $country);
    // $ps1->execute();
    
    if($pdo)
    {
        $q1 = "SELECT * FROM Countries";
        $res = $pdo->query($q1);
        echo "<table class='table table-striped'><thead><tr><th>#</th><th>Country</th></tr></thead><tbody>";
        while($row = $res->fetch())
            echo "<tr><td>$row[Id]</td><td>$row[Country]</td></tr>";
        echo "</tbody></table>";
    }
    
?>