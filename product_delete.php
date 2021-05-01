<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    require_once 'admin_daos/admin_dao.php';
    // 前のページから商品id 取得
    $id = $_POST['id'];
    // item_daoを使い登録されている商品情報を削除する
    $delete = itemDAO::delete_item($id);
    // 削除したメッセージ保存
    $_SESSION['delete_message'] = '商品番号' . $id . 'の商品を削除しました。';
    // 画面遷移
    header('Location: product_change.php') ;
    exit;

    
?>