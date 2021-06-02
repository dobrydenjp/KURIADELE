<?php
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    // セッション開始
    session_start();
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
    // 入力エラーがないならば
    if(count($error_message) === 0){
        // 登録する 同時に下部に登録情報表示する
        // 追加した口座情報を bank_message へ
        $bank_message = AdminDAO::insert($bank);
        // 銀行口座を登録した際にbank_messageを表示する
        $_SESSION['flash_message'] = $bank_message;
        header('Location: transfer_bank.php');
        exit;
    }else{  // 入力エラーがあるならば
            // 登録できない
        $_SESSION['error_message'] = $error_message;
        // 画面遷移
        header('Location: transfer_bank.php');
        exit;
    }
?>