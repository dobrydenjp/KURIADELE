<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'item_dao.php';
    // セッション開始
    // session_start();
    $id = null;
    // $idをGETで取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 登録した全ての商品情報取得
    $items = ItemDAO::get_all_items();
    
?>

<!doctype html>
<thml lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>取り扱い商品一覧</title>
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
                    <form method='POST' action='送信先'>
                        <input type="text" name=""/><input type="submit" name="" value='検索'/>
                    </form>
                </span>
            
                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                </button>
                <div class="dropdown-menu">
                    <a class='dropdown-item' href='#'><a href='company_philosophy.php'>KURIADELEについて</a>
                    <a class='dropdown-item' href='#'><a href='login_product.php'>取扱商品</a>
                    <a class='dropdown-item' href='#'><a href='login_contact.php'>サポート</a>
                </div>
            </div>
        </div>
        
        <div class='customer'>取り扱い商品<br>一覧</div>
        
        
        
        <?php foreach($items as $item): ?>
            <form method='POST' action='item_new.php'>
                <div class='product_1'>
                
                    <a><?= $item->id ?></a>
                    <img src='upload/items/<?= $item->image ?>' class='product_2'></img>
                    <div class='product_3'><?= $item->name ?>          ￥<?= $item->price ?></div>
                    <p class='product_4'><a href='login_buy.php?id=<?= $item->id ?>'>詳細ページへ</a></p>
                                                            
            
                </div>
            </form>
        <?php endforeach; ?>
        

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
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</thml>
