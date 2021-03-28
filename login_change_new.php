<?php
    // 外部ファイル読込
    require_once 'customer_dao.php';
    // セクション開始
    session_start(); 
    // ログイン者の情報取得
    $login_customer = $_SESSION['login_customer'];
    // 入力した新会員情報をセッションに保存
    $customer_id = $login_customer->id;
    var_dump($login_customer);
    // 入力された情報を保存
    $name = $_POST['name'];
    $kana_name = $_POST['kana_name'];
    $postal_code = $_POST['postal_code'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    var_dump($_POST);
    // 会員登録情報　変更
    $customer_update = CustomerDAO::update($id, $name, $kana_name, $postal_code, $address, $tel, $email_address, $password);
    var_dump($customer_update);
    
    $_SESSION['name'] = $name . 'に変更しました';
    $_SESSION['kana_name'] = $kana_name . 'に変更しました';
    $_SESSION['postal_code'] = $postal_code . 'に変更しました';
    $_SESSION['address'] = $address . 'に変更しました';
    $_SESSION['tel'] = $tel . 'に変更しました';
    $_SESSION['email_address'] = $email_address . 'に変更しました';
    $_SESSION['password'] = $password . 'に変更しました';
    // var_dump($_SESSION);
    // header('Location: login_change.php');
    // exit;
?>