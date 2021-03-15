<?php
    class News{
        public $id;
        public $days;
        public $news;
        
        public function __construct($days='', $news=''){
            $this->days = $days;
            $this->news = $news;
        }
    }
?>