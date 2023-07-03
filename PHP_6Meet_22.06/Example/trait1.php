<?
interface IFigure{
    const PI = 3.14;
    function P();
    function S();
}
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
trait Collect{
    function add(&$arr){
        $arr[]=$this;
    }
}
class Rectangle extends Point implements IFigure{
    use Collect;
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
    public static function createCenteredRectangle($w,$h){
        $instance = new self(0,0,$w,$h);
        return $instance;
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
class Circle extends Point implements IFigure{
    use Collect;
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
        $p=(2*$this::PI*$this->radius);
        echo "<div>P = $p</div>";
        return $p;
    }
    function S(){
        $s=$this::PI*pow($this->radius,2);
        echo "<div>S = $s</div>";
        return $s;
    }
}
// $point1 = new Point(10,20);
$figures = array();
$rect = new Rectangle(50,100,150,200);
$rect->add($figures);
$rect2 = Rectangle::createCenteredRectangle(25,50);
$circle = new Circle(20,40,100);
$circle->add($figures);
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
$str = serialize($rect);
file_put_contents("rectangle.txt",$str);
$str = file_get_contents("rectangle.txt");
$p1= unserialize($str);
echo "<h2>".$p1->width."</h2>";
$p1->show();
?>