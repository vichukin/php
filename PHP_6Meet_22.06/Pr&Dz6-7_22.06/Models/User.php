<?
    class User{
        private $Login;
        private $Password;
        function checkLogin($login) : bool{
            return $this->Login==$login;
        }
        function checkPassword($pass) :bool
        {
            return password_verify($pass, $this->Password);
        }
        function __construct($log,$pass)
        {
            $this->Login=$log;
            $this->Password=$pass;
        }
    }
?>