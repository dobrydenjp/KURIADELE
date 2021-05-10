<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>管理者会員登録</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
         <div class='container-fluid sticky-top'>
            <div class='row header'>
                <a href='admin_index.php' class='logo'><span class='col-lg-2 '>KURIADELE</span></a>
                <span class='offset-lg-4 col-lg-3 px-0 span_a'>
                    <a href='index.php' class='span_b'>顧客TOP</a>
                    <a href='admin_login.php' class='span_b'>ログイン</a>
                </span>   
            </div>
        </div>
        <p class='customer'>管理者会員登録</p>
        <!--管理者会員登録したメッセージ表示-->
        <?php if($flash_message !== null): ?>
            <p><?= $flash_message ?></p>
        <?php endif; ?>
        <!--入力エラーメッセージ表示-->
        <?php if($error_message !== null): ?>
            <?php foreach($error_message as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <form method='POST' action='admin_register_new.php'>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>お名前</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='name' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>メールアドレス(ログインＩＤになります)</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='email_address' class='form-control'/>
                    </div>
                </div>
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>ログインパスワード</label>
                    <div class='col-lg-4 col-12'>
                        <input type='password' name='password' class='form-control'/>
                    </div>
            </div> 
            <div class='enroll_1'>
                <input type='submit' value='登録'/>
            </div>
        </form>
        <div class='footer'>
            <ul><span>KURIADELEについて</span><br>
                <li><a href='company.php'>企業紹介</a></li>
            </ul>
            <ul><span>取扱商品</span>
                <li><a href='product.php'>商品一覧</a></li>
            </ul>
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</html>