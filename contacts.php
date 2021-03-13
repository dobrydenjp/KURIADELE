<?php
    // 外部ファイル読込
    require_once 'contact_dao.php';
    // セッション開始
    session_start();
    // 質問項目入力エラーメッセージ表示
    $contact_error = $_SESSION['contact_error'];
    // 破棄
    $_SESSION['contact_error'] = null;
    // var_dump($contact_error);
    // 送信できた場合のメッセージ
    $contact_message = $_SESSION['contact_message'];
    // 破棄
    $_SESSION['contact_message'] = null;
    // var_dump($contact_message);
?>


<!doctype html>

<thml lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>お問い合わせ</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='col-lg-12'>
            <div class='header row'>
        
                <a href='index.php' class='logo'><span class='com'>KURIADELE</span></a>
                
                <span class='info_1'><a href='items.php'>商品情報</a></span>
                <span class='info_2'><a href='contact.php'>お問い合わせ</a></span>
                <span class='info_3'><a href='login.php'>ログイン</a></span>
                
                
                
                <span class='info'>
                    <form method='POST' action=''>
                        <input type='text' name=''/><input type='submit' name='' value='検索'/>
                    </form>
                </span>
            
                <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown'>
                </button>
                <!--<div class='dropdown-menu'>-->
                <!--    <a class='dropdown-item' href='#'><a href='corporate_philosophy.php'>KURIADELEについて</a>-->
                <!--    <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>-->
                <!--    <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>-->
                <!--</div>-->
            </div>
        </div>
        <div class='question' >
            何かありましたらご連絡ください。
        </div>
        
        <?php if($contact_error !== null): ?>
            <?php foreach($contact_error as $error): ?>
                <p><?= $error ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if($contact_message !== null): ?>
                <p><?= $contact_message ?>
        <?php endif; ?>
        
        <form method='POST' action='contact_new.php'>
            <div class='question_2'>お名前  <input type='text' name='name' class='submit' /></div>
            <div class='question_2'>件名  <input type='text' name='subject' class='submit' /></div> 
            <div class='question_3'><p>内容</p>  <textarea name='contact' cols='50' rows='10'/></textarea></div>
            <div class='question_2 question_5'>メールアドレス <input type='text' name='email_address' class='submit'/> </div>
            <div class='enroll_2'><input type='submit' value='送信'/></div>
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
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</thml>
