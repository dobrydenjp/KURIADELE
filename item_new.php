<?php
    require_once 'item_dao.php';
    session_start();
    // var_dump($_POST); // 全ての情報が入っている
    // var_dump($_FILES);// 選択した画像が入っている
    // 入力情報の取得
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    
    
    // 画像をアップロード
    $image = ItemDAO::upload();
    
    // itemの命誕生
    $item = new Item($id, $name, $image, $price, $stock, $description);
    ItemDAO::insert($item);
    
    $_SESSION['flash_message'] = '商品の登録が完了しました。内容確認';
    header('Location: product_information_change_1.php');
    exit;
    
    
?>