<?php
    // 外部ファイル読込
    require_once 'admin_dao.php';
    // セッション開始
    session_start();
    // var_dump($_POST);
    // $_POST = [];
    // // var_dump($_POST);
    // // // 入力情報を保存
    $bank_name = $_POST['bank_name'];
    $branch_name = $_POST['branch_name'];
    $account = $_POST['account'];
    $NO = $_POST['NO'];
    $kana_name = $_POST['kana_name'];
    // Bank命の誕生
    $bank = new Bank($bank_name, $branch_name, $account, $NO, $kana_name);
    // 追加した口座情報をflash_messageへ
    $flash_message = AdminDAO::insert($bank);
    // 銀行口座を登録した際にflash_messageを表示する
    $_SESSION['flash_message'] = $flash_message;
    header('Location: administrator.php');
    exit;
    // var_dump($bank);
    
    // // sqlに銀行情報保存する
    // class daoを使う
    // 管理者が振込先を入力
    // お客さん側の購入　支払銀行確認する場所に反映

?>
