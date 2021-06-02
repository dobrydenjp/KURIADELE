<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>管理者ログイン</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
         <div class='container-fluid header fixed-top'>
            <div class='row'>
                <span class='col-lg-2 col-md-2 col-auto'>
                    <a href='admin_login.php'><h1>KURIADELE</h1></a>
                </span>
                <span class='col-lg-7 col-md-5 d-none d-lg-block span_a'>
                    <a href='index.php' class='span_b'>顧客TOP</a>
                    <a href='admin_sign_up.php' class='span_b'>新規登録</a>
                </span>    
            </div>
        </div>
        <p class='body'>
            <p class='customer'>管理者ページログイン</p>
            <!--ログインエラーメッセージ-->
            <?php if($error_message !== null): ?>
                <p class='error_message'><?= $error_message ?></p>
            <?php endif; ?>
            <!--ログアウトメッセージ-->
            <!--管理者会員登録したメッセージ表示-->
            <?php if($flash_message !== null): ?>
                <p class='message'><?= $flash_message ?></p>
            <?php endif; ?>
            <form action='admin_new.php' method='POST'>
                <div class='login_2'>
                    メールアドレス&emsp;<input type='text' name='email_address' /><br><br>
                    パスワード&emsp;&emsp;&emsp;<input type='password' name='password'/><br>
                    <p class='entry'><input type='submit' value='login' class='btn-gradient'/></p>
                </div>
            </form>
        
        <div class='container-fluid footer'>
            <div class='row'>
                <ul><span class='col-lg-4'>KURIADELEについて</span><br>
                    <li><a href='admin_login.php'>企業紹介</a></li>
                </ul>
                <ul><span class='col-lg-4'>取扱商品</span>
                    <li><a href='admin_login.php'>商品一覧</a></li>
                </ul>
            </div>  
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</html>
