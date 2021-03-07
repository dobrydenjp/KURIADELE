<?php
    // 管理者クラス
    class Admin{
        public $id;
        public $name;
        public $email_address;
        public $password;
        public $created_at;
        
        
        public function __construct($name='',$email_address='', $password=''){
            $this->name = $name;   
            $this->email_address = $email_address;
            $this->password = $password;
            
        }

        
            

    }
?>