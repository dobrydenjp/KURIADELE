<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    require_once 'daos/item_dao.php';
    // 前のページからidを取得
    $id = $_POST['id'];
    // 選択した公開非公開の情報取得
    $flag = $_POST['flag'];
    // 指定した商品の公開非公開を変更するメソッド
    $flash_message = ItemDAO::change_flag($id, $flag);
    $_SESSION['flash_message'] = $flash_message;
    header('Location: product_change.php');
    exit;
?>