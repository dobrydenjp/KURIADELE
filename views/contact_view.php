<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>お問い合わせ</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid header fixed-top'>
            <div class='row'>
                <span class='col-lg-2 col-md-2 col-auto'>
                    <a href='index.php'><h1>KURIADELE</h1></a>
                </span>
                <span class='col-lg-7 col-md-5 d-none d-lg-block span_a'>
                    <a href='product.php 'class='span_b'>商品情報</a>
                    <a href='login.php'class='span_b'>ログイン</a>
                </span>
                <div class='col-lg-3 col-md-5 col-auto span_c'>
                    <form method='GET' action='search.php'>
                        <input type='search' name='name' size='15'/>
                        <input type='submit' value='検索'/>
                    </form>
                    <button type="button" class="btn btn-light dropdown-toggle d-none d-sm-block" data-toggle="dropdown"></button>
                        <div class="dropdown-menu">
                            <a class='dropdown-item' href='#'><a href='company.php'>KURIADELEについて</a>
                            <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                            <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>
                        </div>
                </div>
            </div>
        </div>
        <p class='body'>
            <p class='customer'>お問い合わせフォーム</p>
            <p class='message'>何かありましたらご連絡ください。</p>
            <!--質問項目入力エラーメッセージ表示-->
            <?php if($error_message !== null): ?>
                <?php foreach($error_message as $error): ?>
                    <p class='error_message'><?= $error ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <!--送信できた場合のメッセージ-->
            <?php if($flash_message !== null): ?>
                <p class='message'><?= $flash_message ?></p>
            <?php endif; ?>
            <form method='POST' action='contact_new.php'>
                <div class='question_2'>お名前&ensp;<input type='text' name='name' class='submit' /></div>
                <div class='question_2'>件名&ensp;&ensp;<input type='text' name='subject' class='submit' /></div> 
                <div class='question_2'><p>内容</p><textarea name='contact' class='question_3'/></textarea></div>
                <div class='address'>メールアドレス&ensp;<input type='text' name='email_address' class='submit'/></div>
                <div class='top_d'><input type='submit' value='送信'/></div>
            </form> 
        </p>
        <div class='container-fluid footer'>
            <div class='row'>
                <ul><span class='col-lg-4'>KURIADELEについて</span><br>
                    <li><a href='company.php'>企業紹介</a></li>
                </ul>
                <ul><span class='col-lg-4'>取扱商品</span>
                    <li><a href='product.php'>商品一覧</a></li>
                </ul>
                <ul><span class='col-lg-4'>サポート</span>
                    <li><a href='contact.php'>お問い合わせ</a></li>
                </ul>
            </div>  
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</html>