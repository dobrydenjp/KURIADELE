<?php
    // 外部ファイル読込
    require_once 'admin_dao.php';
    // セッション開始
    session_start();
    // var_dump($_POST);
    // 入力情報を保存
    $bank_name = $_POST['bank_name'];
    $branch_name = $_POST['branch_name'];
    $account = $_POST['account'];
    $NO = $_POST['NO'];
    $kana_name = $_POST['kana_name'];
    // Bank命の誕生
    $bank = new Bank($bank_name, $branch_name, $account, $NO, $kana_name);
    
    // エラーチェック
    $error_message = AdminDAO::validate($bank);
    // var_dump($error_message);
    // 入力エラーがないならば
    if(count($bank_error) === 0){
        // 登録する 同時に下部に登録情報表示する
        // 追加した口座情報を bank_message へ
        $bank_message = AdminDAO::insert($bank);
        // 銀行口座を登録した際にbank_messageを表示する
        $_SESSION['bank_message'] = $bank_message;
        header('Location: transfer_bank.php');
        exit;
        // var_dump($bank);
    
    }else{  // 入力エラーがあるならば
            // 登録できない
        $_SESSION['error_message'] = $error_message;
        // var_dump($error_message);
        header('Location: transfer_bank.php');
        exit;
    }
?>