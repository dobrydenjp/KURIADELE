<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    // idをGETで取得
    // idをnullにする
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // お客様情報取得
    $customers = CustomerDAO::get_all_humans();
    // viewファイルの表示
    include_once 'admin_views/customer_check_view.php';
?>