<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'customer_dao.php';
    // セクション開始
    session_start(); 
    // ログイン者の情報取得
    $login_customer = $_SESSION['login_customer'];
    // var_dump($customer_id);
    // 入力された情報を保存
    $name = $_POST['name'];
    $kana_name = $_POST['kana_name'];
    $postal_code = $_POST['postal_code'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    // var_dump($_POST);
    // 入力された情報をもとに新しい顧客を作成
    $customer_update = new Customer($name, $kana_name, $postal_code, $address, $tel, $email_address, $password);
    // var_dump($customer_update);
    // 入力チェック
    $errors = CustomerDAO::validate($customer_update);
    // var_dump($errors);
    // 入力間違いがないならば
    if(count($errors) === 0){
        // 会員情報変更の更新
        CustomerDAO::update($customer_update, $login_customer->id);
        $_SESSION['update_message'] = '会員情報を変更しました';
        header('Location: login_change.php');
        exit;
    }else{
        // セッションにエラーメッセージをセット
        $_SESSION['errors'] = $errors;
        // 画面遷移
        header('Location: login_change.php');
        exit;
    } 