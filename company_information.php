<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/company_dao.php';
    // セッション開始
    // session_start();
    // 企業情報入力エラーメッセージ表示
    $company_error = $_SESSION['company_error'];
    // 破棄
    $_SESSION['company_error'] = null;
    // var_dump($company_error);
    // // 企業情報登録コメント表示する
    $company_message = $_SESSION['company_message'];
    // // 破棄
    $_SESSION['company_message'] = null;
    // idをGETで取得

    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id']; 
    }
    // 現在の企業情報表示
    $company = CompanyDAO::get_companys_id($id);
    // var_dump($company);
    // viewファイルの表示
    include_once 'admin_views/company_information_view.php';
?>