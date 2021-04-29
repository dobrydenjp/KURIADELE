<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/purchase_dao.php';
    require_once 'daos/customer_dao.php';
    require_once 'daos/cart_dao.php';
    // セッション開始
    // session_start();
    $login_customer = $_SESSION['login_customer'];
    $my_purchases = PurchaseDAO::get_my_purchases($login_customer->id);
    // viewファイルの表示
    include_once 'views/purchases_view.php';
?>