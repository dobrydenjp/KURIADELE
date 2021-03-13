<?php
    // 会社とは？設計図
    class Company{
        public $id;
        public $description;
        public $greeting;
        public $plan;
        public $days;
        public $news;
        public $created_at;
        
        public function __construct($description='', $greeting='', $plan='', $days='', $news=''){
            $this->description = $description;
            $this->greeting = $greeting;
            $this->plan = $plan;
            $this->days = $days;
            $this->news = $news;
            
            
        }
        
    }
?>