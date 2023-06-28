<?
abstract class Point{
    protected $x;
    protected $y;
    function Show(){
        echo "<div>X = $this->x, Y = $this->y</div>";
    }
    function __construct($x, $y)
    {
        $this->x=$x;
        $this->y=$y;
    }
    abstract function P();
    abstract function S();
}
class Rectagnle extends Point{
    public $width;
    public $height;

    function __construct($x,$y,$w,$h)
    {
        // $this->x=$x;
        // $this->y=$y;
        parent::__construct($x,$y);
        $this->width=$w;
        $this->height=$h;
    }
    function Show(){
        // echo "<div>X = $this->x, Y = $this->y</div>";
        parent::Show();
        echo "<div>Width = $this->width, Height = $this->height</div>";
    }
    function P(){
        $p=(2*$this->width+2*$this->height);
        echo "<div>P = $p</div>";
        return $p;
    }
    function S(){
        $s=$this->width*$this->height;
        echo "<div>S = $s</div>";
        return $s;
    }
}
class Circle extends Point{
    public $radius;
    function __construct($x,$y,$r)
    {
        parent::__construct($x,$y);
        $this->radius=$r;
    }
    function Show(){
        // echo "<div>X = $this->x, Y = $this->y</div>";
        parent::Show();
        echo "<div>Radius = $this->radius</div>";
    }
    function P(){
        $p=(2*pi()*$this->radius);
        echo "<div>P = $p</div>";
        return $p;
    }
    function S(){
        $s=pi()*pow($this->radius,2);
        echo "<div>S = $s</div>";
        return $s;
    }
}
// $point1 = new Point(10,20);
$rect = new Rectagnle(50,100,150,200);
$circle = new Circle(20,40,100);
$figures = array($rect,$circle);
$totPer=0;
$totS=0;
foreach($figures as $elem)
{
    echo $elem->show();
    
    $totPer +=$elem->P();
    $totS+=$elem->S();
    echo"<hr>";
}
echo "<div>Total P = $totPer</div><div>Total S = $totS</div><hr>";
?>