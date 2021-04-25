<?php
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    // セッション開始
    session_start();
    // var_dump($_POST);
    // 入力されたメールアドレス・パスワードを取得する
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    // 入力内容のチェック（入力項目が空でないか？メールアドレスの形の入力か？のみ簡易チェック  daoにより）
    $errors = CustomerDAO::check($email_address, $password);
    // 入力エラーがないならば
    if(count($errors) === 0){
        // 見つかれば
        $customer = CustomerDAO::get_customer($email_address, $password);
        // データベースから、入力された情報を持つ顧客を抜き出す
        // 見つけた{顧客}をセッションに保存
        $_SESSION['login_customer'] = $customer;
        if($customer !== false){
            // login_messageを保存
            $_SESSION['login_message'] = $customer->name . '様　こんにちは';
            // 画面遷移
            header('Location: mypage.php');
            exit;
            }else{ // 見つからなければ
            // エラーメッセージをセッションに保存
            $_SESSION['error_message'] = '入力されたメールアドレスとパスワードを持った会員はいません';
            // 画面遷移
            header('Location: login.php');
            exit;
        }
    }else{ // 入力エラーがあるならば
        // エラーメッセージをセッションに保存
        $_SESSION['errors'] = $errors;
        // 画面遷移
        header('Location: login.php');
        exit;
    }
?>