<?
    function GetMenu(){
        $arr = array("Home"=>"index.php","About"=>"about.php","Contacts"=>"contact.php","Location"=>"map.php","Our projects"=>"project.php");
        $str="";
        foreach($arr as $key=>$val)
        {
            echo "<a href='$val' style='padding:10px; background-color: rgb(200,200,200); text-decoration:none; '>$key</a>";
        }
    }
?>