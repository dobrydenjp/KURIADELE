<?php
    // 外部ファイル読込
    require_once 'admin_daos/contact_dao.php';
    // var_dump($_POST);
    // セッション開始
    session_start();
    // 入力情報の取得
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $contact = $_POST['contact'];
    $email_address = $_POST['email_address'];
    // $contacts命誕生
    $contacts = new Contact($name, $subject, $contact, $email_address);
    // 入力エラーチェック
    $contact_error = ContactDAO::validate($contacts);
    // 入力エラーがないならば
    if(count($contact_error) === 0){
        // 質問事項登録する
        ContactDAO::insert($contacts);
        // メッセージ表示
        $_SESSION['flash_message'] = 'ご質問ありがとうございます。ご返信にはお時間を頂きます。よろしくお願い致します。';
        // 画面遷移
        header('Location: contact.php');
        exit;
    }else{ // 入力エラーがあるならば
        // エラーメッセージ表示
        $_SESSION['error_message'] = $contact_error;
        // 画面遷移
        header('Location: contact.php');
        exit;
    }
?>