<?php
    require_once 'customer_dao.php';
    session_start();
    // var_dump($_POST);
    // 入力されたメールアドレス・パスワードを取得する
    
    $email_address = $_POST['email_address'];
    $password = $_POST['password'];
    
    // print $email_address;
    // print $password
    // if($customer !== false){
        
        
    //     header('Location: index.php');
    //     exit;
//     // 入力されたメールアドレスとパスワードを持っている人をデータベースから抜き出す
//     // そんな顧客がいるかチェック  2つの情報を探し出すメソッド
    // }else{ // いなければ
    $error = CustomerDAO::check($email_address, $password);
    
    if(count($error) === 0){
        $customer = CustomerDAO::get_customer($email_address, $password);
        $_SESSION['login_customer'] = $customer->name . '様　こんにちは';
        header('Location: index.php');
        exit;
    }else{

        $_SESSION['login_error'] = $error;
        header('Location: login.php');
        exit;
        
    // 
    }
        // 
              
        
    // }
    // if(!isset($_SESSION['login_customer'])){
        
    // }
    // var_dump($customer);
//     // 入力されたメールアドレス・パスワードが違う場合
//     // エラーメッセージ表示する
//     // データベースには接続しない
//     // $login_errorにはエラーメッセージ表示するメソッドが入る　DAO
    
// //     // check($customer)のDAOに対して
// //     // そんな顧客がいるかいないかで場合分け
// //     // いれば 　　ではない
//     // if(strcmp( $customer, "" ) === 0){
    
        // var_dump($customer);
       
//     
        
        
    
   
   
?>