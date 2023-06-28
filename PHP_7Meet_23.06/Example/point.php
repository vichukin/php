<?
    class Point{
        public $x;
        public $y;
        function show(){
            echo "<div>X = $this->x, Y = $this->y</div>";
        }
        function __construct($x, $y)
        {
            $this->x=$x;
            $this->y=$y;
        }
        function __sleep()
        {
            return ["x"];
        }
        function __wakeup()
        {
            $this->y=50;
        }
        function __call($name, $arguments)
        {
             echo "<div>Arguments: ".implode(", ",$arguments)."</div>";
             if($name =="moveTo")
             {
                $this->x=$arguments[0];
                $this->y=$arguments[1];
             }
             else if($name=="moveBy")
             {
                $this->x+=$arguments[0];
                $this->y+=$arguments[1];
             }
        }
        function __invoke()
        {
            $xcoord=10*$this->x;
            $ycoord=10*$this->y;
            $r=rand(0,255);
            $g=rand(0,255);
            $b=rand(0,255);
            $color = "rgb($r,$g,$b)";
            echo "<div style='display: inline-block; position: absolute;width: 100px;height: 100px;
            border-radius: 50%;top: $ycoord;left: $xcoord; background-color: $color;'></div>";
        }
    }
   
?>