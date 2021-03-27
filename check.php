<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'cart_dao.php';
    require_once 'customer_dao.php';
    // セッション開始
    session_start();
    // ログイン者の情報保存
    $login_customer = $_SESSION['login_customer'];
    // 
    $my_carts = CartDAO::get_my_carts($login_customer->id);
    // var_dump($my_carts);

?>
<?php
    // ログインフィルター
    require_once 'login_filter.php';
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
        <div class='container-fluid sticky-top'>
            <div class='row  header '>
                <a href='index.php' class='logo'><span class='col-lg-2 '>KURIADELE</span></a>
                <span class='col-lg offset-1 col-lg-1 px-0'><a href='mypage.php'><?= $login_customer->name ?>様<br>マイページ</a></span>
                <span class='col-lg-4 px-0 span_a'>
                    <a href='login_product.php' class='span_a'>商品情報</a>
                    <a href='carts.php' class='span_a'>カート</a>
                    <a href='purchases.php' class='span_a'>購入履歴</a>
                    <a href='index.php' class='span_a'>ログアウト</a>
                </span>
                
                <span class='col-lg-1  px-0  info'>
                    <form method='POST' action='search.php' class='info'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                
            
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                    </button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='login_company_philosophy.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='login_product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='login_contact.php'>サポート</a>
                    </div>
                </span>
            </div>
        </div>
        
        <div class='customer'>入力内容確認</div>
      
         <?php foreach($my_carts as $cart): ?>
        <div class='product_1'>
            <p>カート番号:  <?= $cart->id ?></p>
            <p>商品番号: <?= $cart->get_item()->id ?></p>
            <img src='upload/items/<?= $cart->get_item()->image ?>' class='product_2'></img>
            <div class='product_3'><?= $cart->get_item()->name ?>          ￥<?= $cart->get_item()->price ?></div>
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
            <ul><span><a href='login_company_philosophy.php'>KURIADELEについて</a></span><br>
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
    <script type="text/javascript" src="JavaScript2.js"></script>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</thml>
