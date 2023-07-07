<?
    include_once("functions.php");
    $pdo = connect();
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