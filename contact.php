<?php
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
    }
?>
