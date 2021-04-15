<?php
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    require_once 'daos/purchase_dao.php';
    require_once 'daos/cart_dao.php';
    // クリックされた情報をgetで取得
    $id = $_GET['id'];
    // print $id;
    $customer = CustomerDAO::get_customer_by_id($id);
    // var_dump($customer);
    $my_purchases = PurchaseDAO::get_my_purchases($customer->id);
    // var_dump($my_purchases);
    // viewファイルの表示
    include_once 'admin_views/personal_view.php';
?>