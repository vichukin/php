<?
    class Car{
        public $Manufacturer;
        public $Model;
        public $Price;
        function __construct($manuf,$model,$price)
        {
            $this->Manufacturer = $manuf;
            $this->Model = $model;
            $this->Price = $price;         
        }

    }
?>