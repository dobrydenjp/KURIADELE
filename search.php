<?php
    // 外部ファイル読込
    require_once 'item_dao.php';
    // セッション開始
    session_start();
    // 入力された情報を保存
    $keyword = $_POST['name'];
    // var_dump($_POST);
    
    // var_dump($keyword);
    $items = ItemDAO::find_by_keyword($keyword);
    // var_dump($items);
    // 商品名と検索ワードが一致するキーワードならば
    // if(strpos($items, $keyword) === false){
    if(preg_match('/[^ぁ-んーァ-ヶー]/u', $items)){
        
        // // キーワードにヒットする商品を抜き出す
        
        
        $_SESSION['search_message'] = 'キーワードの類似商品が表示されました。';
        // var_dump($_SESSION);
        // // 画面遷移
        header('Location: login_product.php');
        exit;
        
    }else{ // キーワードと商品名が一致しないならば
        // エラーメッセージ表示
        $_SESSION['search_errors'] = '入力された商品名は存在しません。';
        // var_dump($_SESSION);
        // // 画面遷移
        header('Location: mypage.php');
        exit;
    }
    
    // 呼び込み
    include 'login_product.php';
    
    
    
    
?>