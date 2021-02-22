<?php
    require_once 'customer_dao.php';
    session_start();
    // var_dump($_POST);
    // 入力されたメールアドレス・パスワードを取得する
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    
    // print $email_address;
    // print $password
    
    // 入力されたメールアドレスとパスワードを持っている人をデータベースから抜き出す
    // そんな顧客がいるかチェック  2つの情報を探し出すメソッド
   $customer = CustomerDAO::get_customer($email_address, $password);
//   var_dump($customer);
    // そんな顧客がいるかいないかで場合分け
    // いれば 　　ではない
    if($customer !== false){
                    // セッション情報　login_customerというニックネームを保存
        $_SESSION['login_customer'] = $customer;
        header('Location: mypage.php');
        exit;
        
    }else{ // いなければ
    
        $_SESSION['error'] = 'ログインできません';
        header('Location: login.php');
        exit;
    }
   
   
?>