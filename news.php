<?php
    // var_dump($_POST);
    // 外部ファイル読込
    require_once 'news_dao.php';
    // セッション開始
    session_start();
    // 入力情報　保存する
    $days = $_POST['days'];
    $news = $_POST['news'];
    // var_dump($_POST);
    // newsの命の誕生
    $news = new News($days, $news);
    // var_dump($news);
    $news_error = NewsDAO::validate($news);
    // 入力エラーがないならば
    if(count($news_error) === 0){
        // news登録する
        $news = NewsDAO::insert($news);
        // 登録したメッセージ表示
        $_SESSION['news_message'] = '登録が完了しました';
        // var_dump($_SESSION);
        header('Location: KURIADELE_news.php');
        exit;
    }else{ // 入力エラーがあるならば
        // エラーメッセージ表示
        $_SESSION['news_error'] = $news_error;
        // var_dump($_SESSION);
        header('Location: KURIADELE_news.php');
        exit;
        
    }
    

    
    
?>