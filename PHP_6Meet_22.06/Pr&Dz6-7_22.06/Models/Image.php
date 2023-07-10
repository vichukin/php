<?
    class Image{
        public $Title;
        public $ImagePath;
        public $Author;
        function __construct($title,$image,$author)
        {
            $this->Title = $title;
            $this->ImagePath = $image;
            $this->Author = $author;
        }
    }
?>