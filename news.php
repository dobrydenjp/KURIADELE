<?php
    // var_dump($_POST);
    // 外部ファイル読込
    require_once 'news_dao.php';
    
    // 入力情報　保存する
    $days = $_POST['days'];
    $news = $_POST['news'];
    // var_dump($_POST);
    // newsの命の誕生
    $news = new Company($days, $news);
    var_dump($news);
    
    
    
    
    
?>