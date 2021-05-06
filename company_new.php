<?php
    // 外部ファイル読込
    require_once 'admin_daos/company_dao.php';
    // セッション開始
    session_start();
    // 入力情報取得
    $description = $_POST['description'];
    $greeting = $_POST['greeting'];
    $plan = $_POST['plan'];
    // company命の誕生
    $company = new Company($description, $greeting, $plan);
    // 入力チェック
    $company_error = CompanyDAO::validate($company);
    // 入力エラーがないならば
    if(count($company_error) === 0){
        // 企業情報を登録する
        CompanyDAO::insert($company);
        // メッセージ表示
        $_SESSION['flash_message'] = '登録が完了しました';
        // 画面遷移
        header('Location: company_information.php');
        exit;
    }else{ // 入力エラーがあるならば
    //       // エラーメッセージ表示
        $_SESSION['error_message'] = $company_error;
        // 画面遷移
        header('Location: company_information.php');
        exit;
    }
?>