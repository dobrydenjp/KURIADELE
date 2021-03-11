<?php
    // 外部ファイル読込
    require_once 'company_dao.php';
    // セッション開始
    session_start();
    
    // 入力情報取得
    $description = $_POST['description'];
    $greeting = $_POST['greeting'];
    $plan = $_POST['plan'];
    // var_dump($_POST);
    // print $description . $greeting . $plan;
    // company命の誕生
    $company = new Company($description, $greeting, $plan);
    // var_dump($company);
    // 企業情報を登録する
    CompanyDAO::insert($company);
    // var_dump($company);
    // メッセージ表示
    $_SESSION['comment'] = '登録が完了しました';
    // var_dump($company);
    header('Location: corporate_information.php');
    exit;
    
?>