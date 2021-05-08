<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/cart_dao.php';
    require_once 'models/customer.php';
    require_once 'daos/item_dao.php';
    // ログイン者の情報保存 login_check.phpからのセッション取得
    $login_customer = $_SESSION['login_customer'];
    // ログイン者のidからカート情報を取得
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    header('Location: purchase_transfer.php');
    exit;
?>