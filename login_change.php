<?php
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'customer_dao.php';
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
        <div class='container-fluid'>
            <div class='row  header '>
                <a href='index.php' class='logo'><span class='col-auto'>KURIADELE</span></a>
                <span class='offset-1 col-auto'><a href='mypage.php'><?= $login_customer->name ?>様<br>マイページ</a></span>
                <span class='offset-1 col-auto'><a href='product.php'>商品情報</a></span>
                <span class='col-auto '><a href='carts.php'>カート</a></span>
                <span class='col-auto '><a href='purchases.php'>購入履歴</a></span>
                <span class='col-auto '><a href='index.php'>ログアウト</a></span>
                
                
                
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
        <div class='customer'>お客様情報変更</div>
        <?php if($errors !== null): ?>
                <?php foreach($errors as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            
        <form method='POST' action='login_change_new.php'>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>お名前</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='name' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>フリガナ</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='kana_name' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                <label class='col-lg-4 col-form-label'>郵便番号</label>
                    <div class="col-lg-2 col-4">
                        <input type='text' name='postal_code' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                <label class='col-lg-4 col-form-label'>住所</label>
                    <div class="col-lg-4 col-12">
                        <input type="text" name="address" class='form-control'/>
                    </div>
            </div>
            
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>お電話番号</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='tel' class='form-control'/>
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
        
        
        
        
        <div class=corporation_1><a href='login_contact.php'>戻る</a></div>
        <div class='footer '>
            <ul><span><a href='company_philosophy.php'>KURIADELEについて</a></span><br>
                <li>代表挨拶</li>
                <li>事業計画</li>
                <li>展望</li>
            </ul>
            <ul><span><a href='product.php'>取扱商品</a></span>
                <li>商品一覧</li>
            </ul>
            <ul><span><a href='login_contact.php'>サポート</a></span>
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
