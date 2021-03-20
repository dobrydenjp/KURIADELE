<?php
    // 外部ファイル読込
    require_once 'item_dao.php';
    // セッション開始
    session_start();
    // var_dump($_POST); // 全ての情報が入っている
    // var_dump($_FILES);// 選択した画像が入っている
    
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
    // // // 選択されていないとき  登録できないようにする
    // // // 選択されたとき  登録できるようにする

    // // // itemの命誕生
    $item = new Item($name, $image, $price, $stock, $description);
    // var_dump($item);
    
    
    // 入力内容のチェック
    $errors = ItemDAO::validate($item);
    // var_dump($errors);
    // 入力エラーがないならば
    if(count($errors) === 0){
        // 商品を登録する
        ItemDAO::insert($item);
        // var_dump($item);
        // エラーがない場合
        $_SESSION['register_message'] = '商品の登録が完了しました。内容確認';
        header('Location: product_change.php');
        exit;
    }else{
        // それ以外  間違いがある場合  エラーメッセージ表示
        $_SESSION['errors'] = $errors;
        header('Location: product_change.php');
        exit;
    }
?>