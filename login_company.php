<?php
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    require_once 'admin_daos/company_dao.php';
    // セッション開始
    session_start();
    // idをGETで取得
    // $idをnullにする
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // ログイン者の情報取得
    $login_customer = $_SESSION['login_customer'];
    // 現在の企業情報表示
    $company = CompanyDAO::get_companys_id($id);
    // viewファイルの表示
    include_once 'views/login_company_view.php';
?>