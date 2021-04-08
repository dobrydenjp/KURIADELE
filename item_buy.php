<?php
    
    // 外部ファイル読込
    require_once 'item_dao.php';
    // セッション開始
    session_start();
    // 前のページ）から読込
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    
    
    // ItemDAOを使い、idの商品情報取得
    $item = ItemDAO::get_item_by_id($id);
    
    var_dump($item);
    // 在庫がないならば
    if(count($item->stock) <= 0){
        // login_buyにて在庫なしのメッセージを表示する
        $_SESSION['no_stock'] = '在庫はありません';
        var_dump($_SESSION);
    //     header('Location: login_buy.php');
    //     exit;
    //     // カートに入れるボタンはなくなるようにする
        
    // }else{ // 在庫があるならば
    //     // 詳細ページにセレクトボックスに数字が入る
    //     header('Location: login_buy.php');
    //     exit;
    }
                      

?>