<?php
    // 外部ファイル読込
    require_once 'customer_dao.php';
    // セッション開始
    session_start();
    // registration_new.phpのセッション  フラッシュメッセージ取得
    // flas_messageをセッションから取得 新規会員登録成功
    $done_message = $_SESSION['done_message'];
    // セッションに保存されたflash_messageを一旦破棄（使いまわす為）
    $_SESSION['done_message'] = null;
    
    // // 入力エラー内容の $errors をセッションから取得
    // $error_customer = $_SESSION['error_customer'];
    $errors = $_SESSION['errors'];
    // 破棄
    $_SESSION['errors'] = null;
    // var_dump($errors);
    
    // データベースを探してその様な顧客が見つからなかったという
    //  error_message をセッションから取得
    $error_message = $_SESSION['error_message'];
    // // 破棄
    $_SESSION['error_message'] = null;
    
    
    // var_dump($error_message);
    
    
?>

<!doctype html>
<thml lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>ログイン</title>
        <link rel='stylesheet' type="text/css" href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid sticky-top'>
            <div class='row  header '>
                <a href='index.php' class='logo'><span class='col-lg-2 '>KURIADELE</span></a>
                <span class='col-lg-4 offset-lg-2 px-0 span_a'>
                    <a href='product.php' class='span_a'>商品情報</a>
                    <a href='contacts.php' class='span_a'>お問い合わせ</a>
                    <a href='login.php' class='span_a'>ログイン</a>
                </span>    
                
                <span class='col-lg-1  px-0  info'>
                    <form method='POST' action='search.php' class='info'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                
            
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                    </button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='company_philosophy.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='login_product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='login_contact.php'>サポート</a>
                    </div>
                </span>
            </div>
        </div>
        <br><br>
    
        <div class='customer'>
            <a href='sign_up.php'>
            新規会員登録の方はこちら
            </a>
        </div>
        <br>
        <br>
        <!--新規登録成功のメッセージ表示-->
        <?php if($done_message !== null): ?>
            <p><?= $dene_message ?></p>
        <?php endif; ?>
        
        <!--入力したメールアドレスとパスワードが登録と違う場合のエラーメッセージ表示-->
        <?php if($error_message !== null): ?>
            <p><?= $error_message ?></p>
        <?php endif; ?>
        
        
        <div class='login_1'>ＭＹページログイン</div>
        <!--入力していない場合やどちらかの入力の場合エラーメッセージ表示-->
        <?php if($errors !== null): ?>
            <?php foreach($errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <form action='login_check.php' method='POST'>
            <div class='login_2'>
                メールアドレス  <input type='text' name='email_address' /><br><br>
                パスワード  <input type='password' name='password'/><br>
            
            
                <p class='enroll_1'><input type='submit' value='login'/></p>
            </div>
        </form>             
        <br>
                                    
        
        
    
    
    
    
    
        <div class='footer '>
            <ul><span><a href='company_philosophy.php'>KURIADELEについて</a></span><br>
                <li>代表挨拶</li>
                <li>事業計画</li>
                <li>展望</li>
            </ul>
            <ul><span><a href='product.php'>取扱商品</a></span>
                <li>商品一覧</li>
            </ul>
            <ul><span><a href='contacts.php'>サポート</a></span>
                <li>お問い合わせ</li>
            </ul>
            <!--<ul><span>SNSアカウント</span>-->
            <!--</ul>-->
            
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
    
    
    
</thml>
