<?php
    // var_dump($_POST);
    // インスタンス
    session_start();
    require_once 'customer_dao.php';
    // 入力情報の取得
    $name = $_POST['name'];
    $kana_name = $_POST['kana_name'];
    $postal_code = $_POST['postal_code'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    
    
    // 入力情報をもとに新しい顧客のインスタンス作成
    $customer = new Customer($name, $kana_name, $postal_code, $address, $tel, $email_address, $password);
    
    // 入力チェック CustomerDAOのvalidate($customer)に書いてある
    $errors = CustomerDAO::validate($customer);
    
    
    // 入力エラーが１つもなければ
    if(count($errors) === 0){
        // 顧客情報をデータベースに保存する
        CustomerDAO::insert($customer);
        // メッセージをセッションに保存
        $_SESSION['done_message'] = $name . 'さんの登録が完了しました';
        // ログイン画面に遷移
        header('Location: login.php');
        exit;
    }else{ // 入力エラーが１つでもあれば
        // エラーメッセージ配列をセッションに保存する
        $_SESSION['errors'] = $errors;
        // 入力画面に戻る
        header('Location: sign_up.php');
        exit;
    }
        
       
    
   
   
    
       
?>