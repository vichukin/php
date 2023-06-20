
<?

setcookie("registered", "1", time()+60*3, "/PHP_5Meet_20.06/Example/pages", "", 0, 0);

echo "<div>Successsfully register!</div>";

echo "<script>
        location = '/PHP_5Meet_20.06/Example/pages/login.php';
    </script>";

?>