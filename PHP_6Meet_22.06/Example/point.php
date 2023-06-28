<?
    class Point{
        private $x;
        private $y;
        function show(){
            echo "<div>X = $this->x, Y = $this->y</div>";
        }
        function __construct($x, $y)
        {
            $this->x=$x;
            $this->y=$y;
        }
    }
    $p1=new Point(100,200);
    // $p1->x=100;
    // $p1->y=100; 
    var_dump($p1);
    $p1->show();
?>