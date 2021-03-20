<?php
    // 外部ファイル読込
    require_once 'customer_dao.php';
    
    class Contact{
        public $id;
        public $name;
        public $subject;
        public $contact;
        public $email_address;
        public $created_at;
        
        public function __construct($name='', $subject='', $contact='', $email_address=''){
            $this->name = $name;
            $this->subject = $subject;
            $this->contact = $contact;
            $this->email_address = $email_address;
        }
        
        public function get_customer(){
            $customer = CustomerDAO::get_customer_by_id($this->id);
            return $customer;
        }
    }
?>
