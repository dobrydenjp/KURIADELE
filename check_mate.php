<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/cart_dao.php';
    require_once 'daos/customer_dao.php';
    // ログイン者の情報保存
    $login_customer = $_SESSION['login_customer'];
    // カートに入っている商品取得
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    // 商品がないメッセージ取得
    $flash_message = $_SESSION['flash_message'];
    // 1度のみ表示
    $_SESSION['flash_message'] = null;
    // viewファイルの表示
    include_once 'views/check_mate_view.php';
?>