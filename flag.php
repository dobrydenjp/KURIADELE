<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    require_once 'daos/item_dao.php';
    
    // 前のページからidを取得
    $id = $_POST['id'];
    // 選択した公開非公開の情報取得
    $flag = $_POST['flag'];
    
    // 指定した商品の公開非公開を変更するメソッド
    $flash_message = ItemDAO::change_flag($id, $flag);
    $_SESSION['flash_message'] = $flash_message;
    header('Location: product_change.php');
    exit;
    // // 選択した商品情報の取得
    // $item = ItemDAO::get_item_by_id($id);
    
    // if($item->flag !== 0){
    //     // itemDAOを使って商品の公開非公開変更
    //     itemDAO::update($id, $flag);
        
    //     $_SESSION['item'] = $item;

    //     $flash_message = '公開にしました';
    //     var_dump($_SESSION);
    // }else{
    //     $_SESSION['item'] = $item;

    //     $flash_message = '非公開にしました';
    //     var_dump($_SESSION);
    // }
    
    
    
    
    
    
    // // 選択した商品が0ならば
    // if($item->flag === '0'){
    // //     // 非公開のメッセージ
    //     $flash_message = '商品番号' . $id . 'を、非公開にしました';
    // //     // header('Location: product.change.php');
    // //     // exit;
    // }else{
    //     $item = ItemDAO::get_item_by_id($id);
    // //     // 0でないなら公開のメッセージ
    //     $flash_message = '商品番号' . $id . 'を、公開にしました';
    // //     // header('Location: product.change.php');
    // //     // exit;
    // }
    
    
    // ItemDAOを使ってその商品情報を取得
    // もし、idごとにセレクトボックスの数字が0なら非公開
    // 0なら商品情報取得しない
    // 1なら商品情報取得
    // セレクトボックスの数字が1なら公開
    
?>