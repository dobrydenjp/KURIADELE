<?php
    // 銀行クラス
    class Bank{
        public $id;
        public $bank_name;
        public $branch_name;
        public $account;
        public $NO;
        public $kana_name;
        public $created_at;
        

        public function __construct($bank_name='', $branch_name='', $account='', $NO='', $kana_name=''){
            $this->bank_name = $bank_name;
            $this->branch_name = $branch_name;
            $this->account = $account;
            $this->NO = $NO;
            $this->name = $kana_name;
        }
    }
?>