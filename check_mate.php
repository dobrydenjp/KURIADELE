<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/cart_dao.php';
    require_once 'daos/customer_dao.php';
    // セッション開始
    // session_start();
    // ログイン者の情報保存
    $login_customer = $_SESSION['login_customer'];
    // カートに入っている商品取得
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    // var_dump($login_customer);
    // viewファイルの表示
    include_once 'views/check_mate_view.php';
?>