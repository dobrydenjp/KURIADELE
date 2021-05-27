<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/contact_dao.php';
    // idをnullにする
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // idによって顧客情報を取得
    $contact = ContactDAO::get_contact_id($id);
    // viewファイルの表示
    include_once 'admin_views/contact_customer_view.php';
?>