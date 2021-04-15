<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'daos/purchase_dao.php';
    require_once 'daos/customer_dao.php';
    require_once 'daos/cart_dao.php';
    // セッション開始
    // session_start();
    // 購入した全ての商品取得
    $purchases = PurchaseDAO::get_all_purchases();
    // var_dump($purchases);
    // viewファイルの表示
    include_once 'admin_views/purchase_infomation_view.php';
?>