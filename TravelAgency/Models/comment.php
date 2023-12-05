<?
    class Comment
    {
        public $Id;
        public $UserId;
        public $HotelId;
        public $Content;
        public $User;
        function __construct($userId,$hotelId,$content,$user="")
        {
            $this->UserId= $userId;
            $this->HotelId= $hotelId;
            $this->Content= $content;
            $this->User= $user;
        }
        static function createFromObject($obj):Comment
        {
            return new Comment($obj->UserId,$obj->HotelId,$obj->Content,$obj->User);
        }
        public static function intoDB($comment):Comment
        {
            $pdo = connect();
            $ps1 = $pdo->prepare("INSERT INTO Comments (`UserId`, `HotelId`, `Content`) VALUES (:UserId, :HotelId, :Content)");
            $arr = (array) $comment;
            // var_dump($arr);
        
            try {
                $ps1->bindParam(':UserId', $arr['UserId']);
                $ps1->bindParam(':HotelId', $arr['HotelId']);
                $ps1->bindParam(':Content', $arr['Content']);
        
                $ps1->execute();
        
                $comment->Id = $pdo->lastInsertId();
                return $comment;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
                return false;
            }
        }
        public static function fromDB($id):Comment
        {
            $pdo->connect();
            $ps1= $pdo->prepare("SELECT * from Comments where Id=?");
            $ps1->bindParam(1,$id);
            try{
                $ps1->execute();
                $ps1->setFetchMode(PDO::FETCH_OBJ);
                $comment = Comment::createFromObject($ps1->fetch());
                return $comment;
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                return false;
            }
        }
        public static function fromDBAllByHotelId($hotelId):array
        {
            $pdo = connect();
            $ps1= $pdo->prepare("SELECT C.Id, C.UserId,C.HotelId,C.Content,U.login as 'User' from Comments C join Users U on C.UserId=U.Id where C.HotelId=?");
            $ps1->bindParam(1,$hotelId);
            try{
                $ps1->execute();
                $ps1->setFetchMode(PDO::FETCH_OBJ);
                $array = [];
                while($row = $ps1->fetch())
                {
                    $comment = Comment::createFromObject($row);
                    array_push($array,$comment);
                }
                return $array;
            }
            catch(Exception $ex)
            {
                echo $ex->getMessage();
                return false;
            }
        }
    }
?>