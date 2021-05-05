<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/news_dao.php';
    // セッション開始
    // session_start();
    // 入力項目エラーメッセージ表示
    $news_error = $_SESSION['news_error'];
    // 1度のみ表示
    $_SESSION['news_error'] = null;
    
    $news_error = null;
    if(isset($_SESSION['news_error'])){
        $news_error = $_SESSION['news_error'];
    }
    // 保存できた時のメッセージ表示
    $news_message = $_SESSION['news_message'];
    // 1度のみ表示
    $_SESSION['news_message'] = null;
    
    $news_message = null;
    if(isset($_SESSION['news_message'])){
        $news_message = $_SESSION['news_message'];
    }
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