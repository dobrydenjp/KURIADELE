<?php
    // 外部ファイル読込
    require_once 'admin_daos/news_dao.php';
    // セッション開始
    session_start();
    // 入力情報  保存する
    $days = $_POST['days'];
    $news = $_POST['news'];
    // newsの命の誕生
    $news = new News($days, $news);
    $news_error = NewsDAO::validate($news);
    // 入力エラーがないならば
    if(count($news_error) === 0){
        // news登録する
        NewsDAO::insert($news);
        // 登録したメッセージ表示
        $_SESSION['flash_message'] = '登録が完了しました';
        header('Location: KURIADELE_news.php');
        exit;
    }else{ // 入力エラーがあるならば
        // エラーメッセージ表示
        $_SESSION['error_message'] = $news_error;
        header('Location: KURIADELE_news.php');
        exit;
    }
?>