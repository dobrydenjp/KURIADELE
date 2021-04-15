<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/news_dao.php';
    // セッション開始
    // session_start();
    // 入力項目エラーメッセージ表示
    $news_error = $_SESSION['news_error'];
    // 破棄
    $_SESSION['news_error'] = null;
    // var_dump($news_error);
    // 保存できた時のメッセージ表示
    $news_message = $_SESSION['news_message'];
    // 破棄
    $_SESSION['news_message'] = null;
    // var_dump($news_message);
    // idをGETで取得
    // $idをnullにする
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // newsの情報取得
    $news = NewsDAO::get_news_id($id);
    // var_dump($news);
    // viewファイルの表示
    include_once 'admin_views/KURIADELE_news_view.php';
?>