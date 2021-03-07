<?php
    require_once 'login_filter.php';
    require_once 'cart_dao.php';
    require_once 'customer_dao.php';
    session_start();
    
    $login_customer = $_SESSION['login_customer'];
    
    
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    // var_dump($my_carts);

?>
<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>入力内容確認</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='col-12'>
            <div class='header'>
        
                <span class='com'>KURIADELE</span>
                
                <span class='info_1'><a href='product.php'>商品情報</a></span>
                <span class='info_2'><a href='contacts.php'>お問い合わせ</a></span>
                <span class='info_2'><a href='login.php'>ログイン</a></span>
                <span class='info_2'><a href='index.php'>TOPページへ</a></span>
        
                <span class='info'>
                    <form method='POST' action='送信先'>
                        <input type='text' name=''/><input type='submit' name='' value='検索'/>
                    </form>
                </span>
            
                <div class='dropdown-menu_button'>
                    <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown'>
                    </button>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' href='#'><a href='corporate_philosophy.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class='customer'>入力内容確認</div>
      
         <?php foreach($my_carts as $cart): ?>
        <div class='product_1'>
            <p>カート番号:  <?= $cart->id ?></p>
            <p>商品番号: <?= $cart->get_item()->id ?></p>
            <img src='upload/items/<?= $cart->get_item()->image ?>' class='product_2'></img>
            <div class='product_3'><?= $cart->get_item()->name  ?>          ￥<?= $cart->get_item()->price ?></div>
            <p>個数: <?= $cart->number ?></p>
            <p>小計: ￥<?= $cart->number * $cart->get_item()->price ?></p>
        </div>
        <?php endforeach; ?>
        
        <h3>合計金額: ￥<?= CartDAO::get_total_price($my_carts) ?></h3>
        
        <div class=''>ご入力された内容にお間違いがない方は次にお進みください</div>
        
        <form mathod='POST' action='check_mate.php' class='enroll_1'>
            
            <input type="submit" value="最終確認"/>
        </form>
        
        <div class='footer '>
            <ul><span><a href='corporate_philosophy.php'>KURIADELEについて</a></span><br>
                <li>代表挨拶</li>
                <li>事業計画</li>
                <li>展望</li>
            </ul>
            <ul><span><a href='product.php'>取扱商品</a></span>
                <li>商品一覧</li>
            </ul>
            <ul><span><a href='contact.php'>サポート</a></span>
                <li>お問い合わせ</li>
            </ul>
            <ul><span>SNSアカウント</span>
            </ul>
            
        </div>
    <script type="text/javascript" src="JavaScript2.js"></script>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</thml>
