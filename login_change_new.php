<?php
    // 外部ファイル読込
    require_once 'customer_dao.php';
    
    // $idをPOSTで取得
    $id = $_GET['id'];
    $name = $_POST['name'];
    $kana_name = $_POST['kana_name'];
    $postal_code = $_POST['postal_code'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    // var_dump($_POST);
    // 会員情報へんこうする
    $customer_update = CustomerDAO::update($id, $name, $kana_name, $postal_code, $address, $tel, $email_address, $password);
    var_dump($customer_update);
?>