<?
    include_once("User.php");
    function ValidateLogin($login) : bool|User{
        $file = fopen("Files/Users.json","r") or die("false");
        if($file!="false")
        {
            $arr = array();
            while($str = fgets($file))
            {
                $obj = unserialize($str);
                if($obj)
                {
                    $arr[]= $obj;
                }
                
            }
            fclose($file);
            foreach($arr as $elem)
                if($elem->checkLogin($login))
                    return $elem;
            return false;
        }
        return false;
    }
    function ValidateForLogIn($login,$password){
        $buf = ValidateLogin($login);
        if($buf)
        {
            $check = $buf->checkPassword($password);
            if($check)
                return "";
            else 
                return "Wrong password!";
        }
        return "Wrong login";
    }
    function ValidateForRegister($login){
        $buf = ValidateLogin($login);
        if($buf)
        {
            return "This login already exists!";
        }
        return "";
    }
?>