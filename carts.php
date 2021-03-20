<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'cart_dao.php';
    require_once 'customer_dao.php';
    // セッション開始
    session_start();
    // ログイン者の情報保存 login_check.phpからのセッション
    $login_customer = $_SESSION['login_customer'];
    // var_dump($login_customer);
    // 商品をカートに入れたメッセージ表示
    $cart_message = $_SESSION['cart_message'];
    // var_dump($cart_message);
    // 破棄
    $_SESSION['cart_message'] = null;
    // ログイン者のidからカート情報を取得
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    var_dump($my_carts);
    // 購入と同時に在庫を減らす
    $my_carts = CartDAO::decrement_stock($cart);
    var_dump($my_carts);
    // カート・入力内容確認・最終確認 個数変更できるようにする
?>
<!doctype html>
<thml lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>買い物かご</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid'>
            <div class='row  header '>
                <a href='index.php' class='logo'><span class='col-auto'>KURIADELE</span></a>
                <span class='offset-1 col-auto'><a href='mypage.php'><?= $login_customer->name ?>様<br>マイページ</a></span>
                <span class='offset-1 col-auto'><a href='login_product.php'>商品情報</a></span>
                <span class='col-auto '><a href='carts.php'>カート</a></span>
                <span class='col-auto '><a href='purchases.php'>購入履歴</a></span>
                <span class='col-auto '><a href='index.php'>ログアウト</a></span>
                
        
                <!--<span class='info'>-->
                <!--    <form method='POST' action='送信先'>-->
                <!--        <input type="text" name=""/><input type="submit" name="" value='検索'/>-->
                <!--    </form>-->
                <!--</span>-->
            
                <!--<button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">-->
                <!--</button>-->
                <!--<div class="dropdown-menu">-->
                <!--    <a class='dropdown-item' href='#'><a href='corporate_philosophy.php'>KURIADELEについて</a>-->
                <!--    <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>-->
                <!--    <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>-->
                <!--</div>-->
            </div>
        </div>

        <div class='customer'>買い物かご</div>
        <!--商品をカートに追加したメッセージ表示-->
        <?php if($cart_message !== null): ?>
            <P><?= $cart_message ?></P>
        <?php endif; ?>
        
        <!--カートに追加した商品情報表示-->
        <?php foreach($my_carts as $cart): ?>
        <div class='product_1'>
            <p>カート番号:  <?= $cart->id ?></p>
            <p>商品番号: <?= $cart->get_item()->id ?></p>
            <img src='upload/items/<?= $cart->get_item()->image ?>' class='product_2'></img>
            <div class='product_3'><?= $cart->get_item()->name  ?>          ￥<?= $cart->get_item()->price ?></div>
            <select class='select_box' name="number">
                <!--個数numberを選択できるようにする-->
                
                <?php for($i = 0; $i <= $cart->get_item()->stock; $i++): ?>
                    <option value='<?= $i ?>'><?= $i ?></option>
                <?php endfor; ?>
            個</select>
            <!--<p>個数: <?= $cart->get_item()->number ?></p>-->
            <p>小計: ￥<?= $cart->get_item()->number * $cart->get_item()->price ?></p>
        </div>
        <?php endforeach; ?>
        
        <h3>合計金額: ￥<?= CartDAO::get_total_price($my_carts) ?></h3>
        
        <form action='purchase_create.php' class='enroll_1'>
            <button type="submit">購入</button>
        </form>
        
        <div class='footer '>
            <ul><span><a href='company_philosophy.php'>KURIADELEについて</a></span><br>
                <li>代表挨拶</li>
                <li>事業計画</li>
                <li>展望</li>
            </ul>
            <ul><span><a href='login_product.php'>取扱商品</a></span>
                <li>商品一覧</li>
            </ul>
            <ul><span><a href='login_contact.php'>サポート</a></span>
                <li>お問い合わせ</li>
            </ul>
            <ul><span>SNSアカウント</span>
            </ul>
            
        </div>
            
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</thml>
