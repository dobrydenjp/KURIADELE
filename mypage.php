<?php
    // ログイン者の個人情報変更できるできるようにする
    // ログインしていない状態で管理者トップへアクセスするのを防ぐ
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'customer_dao.php';
    require_once 'news_dao.php';
    require_once 'item_dao.php';
    // セッション開始
    // session_start();
    // login_checkよりlogin_messsage をセッションから取得
    $login_message = $_SESSION['login_message'];
    // var_dump($flash_message);
    // ログイン者の情報  セッションに保存
    $login_customer = $_SESSION['login_customer'];
    // var_dump($login_customer);
    // idをnullにする
    // GETでid取得
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // データベースから全商品を取得
    $items = ItemDAO::get_all_items();
    // var_dump($items);
    // 表示したい画像をさいころを振って決める
    $rand = mt_rand(0, count($items) - 1);
    // print $rand;
    $items = $items[$rand];
    // newsの情報取得
    $news = NewsDAO::get_news_id($id);
    // var_dump($news);
    
    
    // 検索フォーム入力エラーメッセージ表示
    $search_errors = $_SESSION['search_errors'];
    // 破棄
    $_SESSION['search_errors'] = null;
    // var_dump($_SESSION);
    // include_once 'products.php';

?>


<!doctype html>
<thml lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>Ｍｙページ</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid sticky-top'>
            <div class='row header'>
                <a href='mypage.php' class='logo'><span class='col-lg-2 '>KURIADELE</span></a>
                <span class='offset-lg-4 col-lg-3 px-0 span_c'>
                    <a href='login_contact.php' class='span_d'>お問い合わせ</a>
                    <a href='carts.php' class='span_d'>カート</a>
                    <a href='purchases.php' class='span_d'>購入履歴</a>
                    <a href='logout.php' class='span_d'>ログアウト</a>
                </span>
                
                <span class='col-lg-1 px-0 info'>
                    <form method='GET' action='search.php' class='info'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                
            
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='login_company_philosophy.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='login_product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='login_contact.php'>サポート</a>
                    </div>
                </span>
            </div>
        </div>

        <div class='top_1'>
    
            <div class='top_a'>満足の極みへ</div>
            <div class='top_b'><img src='camera.jpg' alt='camera'></img></div>
        </div>
        
        
        
        <!--ログイン者のメッセージ表示-->
        <?php if($login_message !== null): ?>
            <p><?= $login_message ?></p>
        <?php endif; ?>
        
        <!--検索フォーム入力エラーメッセージ表示-->
        <?php if($search_errors!== null): ?>
            <p><?= $search_errors ?></p>
        <?php endif; ?>
        <div class='top_2'>
            <h4 class='customer'>取扱商品</h4>
            <div class='top_c'><a href='login_product.php'><img src='upload/items/<?= $items->image ?>'></img></a></div>
            
        </div>
        
        
        <div class='top_3'>
            <h4 class='customer'>KURIADELEnews</h1>
            <h3 class='top_d'>今日のニュース</h1>
            
            <h4 class='top_e'><?= $news->days ?>        <?= $news->news ?></h4>
            
        </div>
        
        
       

        
        
        <div class='footer '>
            <ul><span>KURIADELEについて</span><br>
                <li><a href='login_company_philosophy.php'>企業紹介</a></li>

            </ul>
            <ul><span>取扱商品</span>
                <li><a href='login_product.php'>商品一覧</a></li>
            </ul>
            <ul><span>サポート</span>
                <li><a href='login_contact.php'>お問い合わせ</a></li>
                <li><a href='login_change.php'>お客様情報変更</a></li>
            </ul>
            <!--<ul><span>SNSアカウント</span>-->
            <!--</ul>-->
            
        </div>
            
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</thml>
