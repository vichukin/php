<?
    class Hotel{
        public $Id;
        public $HotelName;
        public $Description;
        public $Price;
        public $Stars;
        public $CityId;

        function __construct($desc,$hotelname,$price,$stars,$cityid)
        {
            $this->Description= $desc;
            $this->HotelName= $hotelname;
            $this->Price= $price;
            $this->Stars= $stars;
            $this->CityId= $cityid;
        }
        static function createFromObject($obj):Hotel{
            return new Hotel($obj->Description,$obj->HotelName,$obj->Price,$obj->Stars,$obj->CityId);
        }
        static function intoDB($hotel):Hotel{
            $pdo = connect();
            $ps1= $pdo->prepare("INSERT into Hotels(HotelName,Description,Price,Stars,CityId) VALUES(:HotelName,:Description,:Price,:Stars,:CityId)");
            $arr = (array)$hotel;
            array_shift($arr);
            var_dump($arr);
            try
            {
            $ps1->execute($arr);
            $hotel->Id=$pdo->lastInsertId();
            return $hotel;
            }
            catch(PDOException $ex)
            {
                echo $ex->getMessage();
                return false;
            }
        }
        static function fromDB($id)
        {
            $pdo = connect();
            $ps1= $pdo->prepare("SELECT * from Hotels where Id=?");
            $ps1->bindParam(1,$id);
            try
            {
                $ps1->execute();
                $ps1->setFetchMode(PDO::FETCH_OBJ);
                $row = Hotel::createFromObject($ps1->fetch());
                return $row;
            }
            catch(PDOException $ex)
            {
                echo $ex->getMessage();
                return false;
            }
        }
    }
?>