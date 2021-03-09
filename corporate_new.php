<?php
    // 外部ファイル読込
    require_once 'company_dao.php';
    
    // 入力情報取得
    $description = $_POST['description'];
    $greeting = $_POST['greeting'];
    $plan = $_POST['plan'];
    
    var_dump($_POST);
?>