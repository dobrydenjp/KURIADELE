<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>管理者ページ 振込先</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid header fixed-top'>
            <div class='row'>
                <span class='col-lg-3 col-xs-5'>
                    <a href='admin_index.php' class='logo'>KURIADELE</a>
                </span>
                <span class='col-lg-6 hidden-xs span_a'>
                    <a href='administrator.php' class='span_b'>管理ページへ</a>
                    <a href='index.php' class='span_b'>顧客TOP</a>
                    <a href='admin_logout.php' class='span_b'>ログアウト</a>
                </span>
                <div class='col-lg-3 col-xs-7 span_c'>
                    <form method='GET' action='admin_search.php'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='admin_company.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='admin_product.php'>取扱商品</a>
                    </div>
                </div>
            </div>
        </div>
        <p class='customer'>振込み先情報</p>
        <!--$error_message がnullでないならば-->
        <?php if($error_message !== null): ?>
            <!--入力エラーメッセージ表示-->
            <?php foreach($error_message as $errors): ?>
                <p class='error_message'><?= $errors ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- $flash_message がnullでないならば-->
        <?php if($flash_message !== null): ?>
        <!--銀行口座情報登録メッセージ表示-->
            <p class='message'><?= $flash_message ?></p>
        <?php endif; ?>
        <p class='message'>※&emsp;現在の登録状況を表示しています&emsp;※</p> 
        <form method='POST' action='registration_transfer.php' enctype="multipart/form-data">
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>銀行名</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='bank_name' class='form-control' value='<?= $get_bank->bank_name ?>' />
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>支店名</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='branch_name' class='form-control' value='<?= $get_bank->branch_name ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>預金科目</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='account' class='form-control' value='<?= $get_bank->account ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>口座番号</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='NO' class='form-control' value='<?= $get_bank->NO ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>口座名義人(カナ)</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='kana_name' class='form-control' value='<?= $get_bank->kana_name ?>'/>
                    </div>
            </div>
            <div class='top_d'>
                <input type='submit' value='登録' class='btn-gradient'/>
            </div>
        </form>
        <div class='container-fluid footer'>
            <div class='row'>
            <ul><span class='col-lg-4'>KURIADELEについて</span><br>
                <li><a href='admin_company.php'>企業紹介</a></li>
            </ul>
            <ul><span class='col-lg-4'>取扱商品</span>
                <li><a href='admin_product.php'>商品一覧</a></li>
            </ul>
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</html>