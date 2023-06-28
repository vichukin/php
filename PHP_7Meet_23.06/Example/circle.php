<?
class Circle{
    private $x;
    private $y;
    private $radius;
    function __construct($x,$y,$r)
    {
        $this->x=$x;
        $this->y=$y;
        $this->radius=$r;
    }
    function show(){
        echo "<div>X = $this->x, Y = $this->y, R = $this->radius</div>";
    }
    function __toString()
    {
        return "<div>X = $this->x, Y = $this->y, R = $this->radius</div>";
    }
    function __get($name)
    {
        if(property_exists($this,$name))
        {
            return $this->$name;
        }
        if($name=="radius")
            return $this->radius;
    }
    function __set($property,$value)
    {
        if(property_exists($this,$property))
        {
            $this->$property=$value;
        }
    }
    function __isset($name)
    {
        if(property_exists($this,$name))
        {
            return true;
        }
        else 
            return false;
    }
}
?>