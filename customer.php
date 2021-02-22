<?php
    class Customer {
        public $id;
        public $name;
        public $kana_name;
        public $postal_code;
        public $address;
        public $tel;
        public $email_address;
        public $password;
        public $created_at;// 登録日時
        
        public function __construct($name='', $kana_name='', $postal_code='', $address='', $tel='', $email_address='', $password=''){
            $this->name = $name;
            $this->kana_name = $kana_name;
            $this->postal_code = $postal_code;
            $this->address = $address;
            $this->tel = $tel;
            $this->mail_address = $email_address;
            $this->password = $password;
        }
        
    }
    
    

?>