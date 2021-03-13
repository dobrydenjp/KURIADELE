<?php
    // 外部ファイル読込
    require_once 'contact_dao.php';
    // var_dump($_POST);
    // セッション開始
    session_start();
    // 入力情報の取得
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $contact = $_POST['contact'];
    $email_address = $_POST['email_address'];

    $contacts = new Contact($name, $subject, $contact, $email_address);
    // var_dump($contacts);
    // 入力エラーチェック
    $contact_error = ContactDAO::validate($contacts);
    
    
    // // 入力エラーがないならば
    if(count($contact_error) === 0){
        // 質問事項登録する
        ContactDAO::insert($contacts);
        // var_dump($contacts);
        // メッセージ表示
        $_SESSION['contact_message'] = 'ご質問ありがとうございます。ご返信にはお時間を頂きます。よろしくお願い致します。';
        // var_dump($contacts);
        header('Location: contacts.php');
        exit;
    }else{ // 入力エラーがあるならば
    //         // エラーメッセージ表示
        $_SESSION['contact_error'] = $contact_error;
        // var_dump($contact_error);
        header('Location: contacts.php');
        exit;
    }  
    

    
?>