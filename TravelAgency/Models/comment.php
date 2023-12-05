<?
    class Comment
    {
        public $Id;
        public $UserId;
        public $HotelId;
        public $Content;
        function __construct($userId,$hotelId,$content)
        {
            $this->$UserId= $userId;
            $this->HotelId= $hotelId;
            $this->Content= $content;
        }
        static function createFromObject($obj):Comment
        {
            return new Comment($obj->$userId,$obj->hotelId,$obj->content);
        }
        public static function intoDB($comment):Comment
        {
            $pdo = connect();
            $ps1= $pdo->prepare("INSERT INTO Comments( `UserId`, `HotelId`, `Content`) VALUES (':UserId',':HotelId',':Content')");
            $arr = (array)$comment;
            array_shift($arr);
            try{
                $ps1->execute($arr);
                $comment->id=$pdo->lastInsertId();
                return $comment;
            }
            catch(PDOException $Ex)
            {
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
    }
?>