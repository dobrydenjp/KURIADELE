<?php
    // 外部ファイル読込
    require_once 'customer_dao.php';
    // セッション開始
    session_start();
    // login者の情報　セッションに保存
    $login_customer = $_SESSION['login_customer'];
    // var_dump($login_customer);
    
    // require_once 'login_filter.php';
    // login_checkよりflash_messsage をセッションから取得
    $login_message = $_SESSION['login_message'];
    // var_dump($flash_message);
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
        <div class="col-lg-12">
            <div class='header row'>
        
                <span class='com'>KURIADELE</span>
                <span class='info_1'><a href='mypage.php'><?= $login_customer->name ?>様のページ</a></span>
                <span class='info_1'><a href='product.php'>商品情報</a></span>
                <span class='info_2'><a href='carts.php'>カート</a></span>
                <span class='info_2'><a href='purchases.php'>購入履歴</a></span>
                <span class='info_2'><a href='logout.php'>ログアウト</a></span>
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
        <br>
        <br>
        <div class='top_1'>
            
            <div class='top_a'>満足の極みへ</div>
            <div class='top_b'><img src='camera.jpg' alt='camera'></img></div>
            
            
        </div>
        
        <?php if($login_message !== null): ?>
            <p><?= $login_message ?></p>
        <?php endif; ?>
        <div class='top_2'>
            <h4 class='customer'>取扱商品</h4>
            <div class='top_c'><a href='product.php'><img src='camera_3.jpg' alt='camera'></img></a></div>
            
        </div>
        
        
        <div class='top_3'>
            <h4 class='customer'>KURIADELEnews</h1>
            <h3 class='top_d'>今日のニュース</h1>
            
            <h4 class='top_e'>2021.1.6　合同会社KUREADALE設立</a>
            
        </div>
        
        
       

        
        
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
            
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</thml>
