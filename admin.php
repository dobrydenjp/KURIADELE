<?php
    // 管理者クラス
    class Admin{
        public $id;
        public $admin_name;
        public $kana_name;
        public $email_address;
        public $password;
        public $bank_name;
        public $branch_name;
        public $account;
        public $NO;
        public $created_at;
        
        
        public function __construct($admin_name='', $kana_name='', $email_address='', $password='', $bank_name='', $branch_name='', $account='', $NO=''){
            $this->admin_name = $admin_name;
            $this->kana_name = $kana_name;
            $this->email_address = $email_address;
            $this->password = $password;
            $this->bank_name = $bank_name;
            $this->branch_name = $branch_name;
            $this->account = $account;
            $this->NO = $NO;
            
        }    

        
            

    }
?>