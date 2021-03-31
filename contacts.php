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
        <div class='container-fluid sticky-top'>
            <div class='row header'>
                <a href='index.php' class='logo'><span class='col-lg-2 '>KURIADELE</span></a>
                <span class='col-lg offset-1 col-lg-1 px-0'></span>
                <span class='col-lg-4 px-0 span_a'>
                    <a href='product.php' class='span_a'>商品情報</a>
                    <a href='contacts.php' class='span_a'>お問い合わせ</a>
                    <a href='login.php' class='span_a'>ログイン</a>
                </span>    
                
                <span class='col-lg-1 px-0 info'>
                    <form method='POST' action='search.php' class='info'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                
            
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='company_philosophy.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>
                    </div>
                </span>
            </div>
        </div>
        <div class='question' >
            何かありましたらご連絡ください。
        </div>
        
        <?php if($contact_error !== null): ?>
            <?php foreach($contact_error as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if($contact_message !== null): ?>
                <p><?= $contact_message ?></p>
        <?php endif; ?>
        
        <form method='POST' action='contact_new.php'>
            <div class='question_2'>お名前  <input type='text' name='name' class='submit' /></div>
            <div class='question_2'>件名  <input type='text' name='subject' class='submit' /></div> 
            <div class='question_3'><p>内容</p>  <textarea name='contact' cols='50' rows='10'/></textarea></div>
            <div class='question_2 question_5'>メールアドレス <input type='text' name='email_address' class='submit'/> </div>
            <div class='enroll_2'><input type='submit' value='送信'/></div>
        </form>  
        
        
        
        
        
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
