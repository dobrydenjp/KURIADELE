<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/news_dao.php';
    // セッション開始
    // session_start();
    // 入力項目エラーメッセージ表示
    $error_message = $_SESSION['error_message'];
    // 1度のみ表示
    $_SESSION['error_message'] = null;
    
    // $error_message = null;
    // if(isset($_SESSION['error_message'])){
    //     $error_message = $_SESSION['error_message'];
    // }
    // 保存できた時のメッセージ表示
    $flash_message = $_SESSION['flash_message'];
    // 1度のみ表示
    $_SESSION['flash_message'] = null;
    
    // $flash_message = null;
    // if(isset($_SESSION['flash_message'])){
    //     $flash_message = $_SESSION['flash_message'];
    // }
    // idをGETで取得
    // $idをnullにする
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // newsの情報取得
    $news = NewsDAO::get_news_id($id);
    // viewファイルの表示
    include_once 'admin_views/KURIADELE_news_view.php';
?>