<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    // セッション開始
    // session_start();
    // idをGETで取得
    $id = null;
    // $idをGETで取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 現在の口座情報を表示する
    $get_bank = Admindao::get_bank_by_id($id);
    // viewファイルの表示
    include_once 'views/purchase_transfer_view.php';

?>