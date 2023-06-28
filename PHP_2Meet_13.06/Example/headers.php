<?
$headers = apache_request_headers();
if($headers)
{
    echo "<table><thead><tr><th>key</th><th>Value</th></tr></thead><tbody>";
    foreach($headers as $key=>$value)
    {
        echo"<tr><td>$key</td><td>$value</td></tr>";
    }
    echo"</tbody></table>";
}
else
{
    echo "0 headers here";
}
?>