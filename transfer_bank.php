<?php
    // ログインしていない状態で管理者トップへアクセスするのを防ぐ
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    // セッション開始
    // session_start();
    // 管理者の情報をセッションに保存
    $login_admin = $_SESSION['login_admin'];
    // 銀行口座入力エラーがある場合のメッセージを表示
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;
    if(isset($_SESSION['error_message'])){
        $error_message = $_SESSION['error_message'];
    }
    // 銀行口座を登録した際 flash_message をセッションから取得・表示
    $flash_message = $_SESSION['flash_message'];
    // 1度のみ表示
    $_SESSION['flash_message'] = null;
    // idをGETで取得
    // $idをnullにする
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 現在の口座情報を表示する
    $get_bank = AdminDAO::get_bank_by_id($id);
    // viewファイルの表示
    include_once 'admin_views/transfer_bank_view.php';
?>