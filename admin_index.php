<?php
    // ログイン画面から管理者TOPへ遷移されてしまう
    // ログインしないと画面遷移できないようにする
    // フィルター
    // require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_dao.php';
    // セッション開始
    session_start();

    // ログイン者の情報をセッションに保存
    $login_admin = $_SESSION['login_admin'];
    // var_dump($login_admin);
    
    // どのflash_messageか確認
    $flash_message = $_SESSION['flash_message'];
    // var_dump($flash_message);
    // 1度のみ表示
    // $_SESSION['flash_message'] = null;
?>
<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>管理者TOPページ</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='col-lg-12'>
            <div class='header row'>
        
                <a href='admin_index.php' class='logo'><span class='com'>KURIADELE</span></a>
                <span class='info_1'><a href='index.php'>顧客TOP</a></span>
                <span class='info_2'><a href='product.php'>商品情報確認</a></span>
                <span class='info_3'><a href='administrator.php'>登録内容変更</a></span>
                <span class='info_3'><a href='admin_login.php'>ログアウト</a></span>
                
                <span class='info'>
                    <form method='POST' action='送信先'>
                        <input type='text' name=''/><input type='submit' name='' value='検索'/>
                    </form>
                </span>
            
                <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown'>
                </button>
                <div class='dropdown-menu'>
                    <a class='dropdown-item' href='#'><a href='corporate_philosophy.php'>KURIADELEについて</a>
                    <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                    <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>
                </div>
            </div>
        </div>
        
        <div class='top_1'>
            
            <div class='top_a'>満足の極みへ</div>
            <div class='top_b'><img src='camera.jpg' alt='camera'></img></div>
            
            
        </div>

        <p><?= $login_admin->name ?>様　こんにちは</p>
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
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</thml>
