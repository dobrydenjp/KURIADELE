<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/contact_dao.php';
    // idをGETで取得
    // $idをnullにする
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // お客側問い合わせフォームから受け取る
    $contacts = ContactDAO::get_all_contacts();
    // viewファイルの表示
    include_once 'admin_views/inquiry_check_view.php';
?>