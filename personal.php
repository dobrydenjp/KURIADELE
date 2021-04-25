<?php
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    require_once 'daos/purchase_dao.php';
    require_once 'daos/cart_dao.php';
    // idをGETで取得
    // $idをnullにする
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 選択した顧客のによって顧客情報を表示する
    $customer = CustomerDAO::get_customer_by_id($id);
    // 選択した顧客が購入した商品を一覧表示する
    $my_purchases = PurchaseDAO::get_my_purchases($customer->id);
    // viewファイルの表示
    include_once 'admin_views/personal_view.php';
?>