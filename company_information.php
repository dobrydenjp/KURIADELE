<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/company_dao.php';
    // 企業情報入力エラーメッセージ表示
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;
    // 企業情報登録コメント表示する
    $flash_message = $_SESSION['flash_message'];
    //1度のみ表示
    $_SESSION['flash_message'] = null;
    // idをGETで取得
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id']; 
    }
    // 現在の企業情報表示
    $company = CompanyDAO::get_companys_id($id);
    // viewファイルの表示
    include_once 'admin_views/company_information_view.php';
?>