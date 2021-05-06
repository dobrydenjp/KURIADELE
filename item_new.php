<?php
    // 外部ファイル読込
    require_once 'daos/item_dao.php';
    // セッション開始
    session_start();
    // 入力情報の取得
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    // // 画像が選択されていなければ
    // // アップロード画像のサイズが0の場合
    if($_FILES['image']['size'] === 0){
        // 
        $image = '';
    }else{
        // 選択されている時はitemフォルダに写真を入れる
        // 画像をアップロード
        $image = ItemDAO::upload();
    }
    // itemの命誕生
    $item = new Item($name, $image, $price, $stock, $description);
    // 入力内容のチェック
    $errors = ItemDAO::validate($item);
    // 入力エラーがないならば
    if(count($errors) === 0){
        // 商品を登録する
        ItemDAO::insert($item);
        // エラーがない場合
        $_SESSION['flash_message'] = '商品の登録が完了しました。';
        // 画面遷移
        header('Location: product_change.php');
        exit;
    }else{
        // それ以外  間違いがある場合  エラーメッセージ表示
        $_SESSION['error_message'] = $errors;
        // 画面遷移
        header('Location: product_change.php');
        exit;
    }
?>