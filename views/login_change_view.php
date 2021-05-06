<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>お客様情報変更</title>
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
                    <a href='cart.php' class='span_d'>カート</a>
                    <a href='purchases.php' class='span_d'>購入履歴</a>
                    <a href='logout.php' class='span_d'>ログアウト</a>
                </span>
                <span class='col-lg-1 px-0 info'>
                    <form method='GET' action='login_search.php' class='info'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='login_company.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='login_product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='login_contact.php'>サポート</a>
                    </div>
                </span>
            </div>
        </div>
        <div class='customer'>お客様情報変更</div>
        <!--顧客情報変更入力エラーメッセージ表示-->
        <?php if(count($error_message) !== 0): ?>
            <?php foreach($error_message as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <form method='POST' action='login_update.php'>
            <p class='caution'>入力フォームには、現在の登録情報を記載しております。</p>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>お名前</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='name' class='form-control' value='<?= $login_customer->name ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>フリガナ</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='kana_name' class='form-control' value='<?= $login_customer->kana_name ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                <label class='col-lg-4 col-form-label'>郵便番号</label>
                    <div class="col-lg-2 col-4">
                        <input type='text' name='postal_code' class='form-control' value='<?= $login_customer->postal_code ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                <label class='col-lg-4 col-form-label'>住所</label>
                    <div class="col-lg-4 col-12">
                        <input type="text" name="address" class='form-control' value='<?= $login_customer->address ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>お電話番号</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='tel' class='form-control' value='<?= $login_customer->tel ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>メールアドレス(ログインＩＤになります)</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='email_address' class='form-control' value='<?= $login_customer->email_address ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>ログインパスワード</label>
                    <div class='col-lg-4 col-12'>
                        <input type='password' name='password' class='form-control'/>
                    </div>
            </div> 
            <div class='enroll_1'>
                <input type='submit' value='登録' class='btn-gradient'/>
            </div>
        </form>
        <div class='footer'>
            <ul><span>KURIADELEについて</span><br>
                <li><a href='login_company.php'>企業紹介</a></li>
            </ul>
            <ul><span>取扱商品</span>
                <li><a href='login_product.php'>商品一覧</a></li>
            </ul>
            <ul><span>サポート</span>
                <li><a href='login_contact.php'>お問い合わせ</a></li>
                <li><a href='login_change.php'>お客様情報変更</a></li>
            </ul>
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</html>