<?php
    // 会社とは？設計図
    class Company{
        public $id;
        public $description;
        public $greeting;
        public $plan;
        public $created_at;
        
        public function __construct($description='', $greeting='', $plan=''){
            $this->description = $description;
            $this->greeting = $greeting;
            $this->plan = $plan;
            
        }
    }
?>