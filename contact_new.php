<?php
    // 外部ファイル読込
    require_once 'contact_dao.php';
    // var_dump($_POST);
    
    $name= $_POST['name'];
    $subject = $_POST['subject'];
    $contact = $_POST['contact'];
    $email_address = $_POST['email_address'];

    $contacts = new Contact($name, $subject, $contact, $email_address);
    // ContactDAO::insert($contacts);
    var_dump($contacts);
    // 入力エラーチェック
    $contact_error = ContactDAO::validate($contacts);
    // 入力エラーがないならば
    if(count($contacts) === 0){
        // 質問事項登録する
        ContactDAO::insert($contacts);
        // メッセージ表示
        $_SESSION['contact_message'];
        header('Location: contacts.php');
        exit;
    }else{ // 入力エラーがあるならば
            // エラーメッセージ表示
        $_SESSION['contact_error'];
        header('Location: contacts.php');
        exit;
    }
    

    
?>