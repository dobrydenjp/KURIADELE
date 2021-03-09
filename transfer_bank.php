<?php
    // ログインしていない状態で管理者トップへアクセスするのを防ぐ
   require_once 'admin_login_filter.php';
   // 外部ファイル読込
   require_once 'admin_dao.php';
// セッション開始
   session_start();
   // idをGETで取得
   $id = $_GET['id'];
   // 現在の口座情報を表示する
   $get_bank = Admindao::get_bank_by_id($id);
//   var_dump($get_bank);
   // 変更できるようにする
?>

<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>管理者ページ</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='col-lg-12'>
            <div class='header row'>
        
                <span class='com'>KURIADELE</span>
                <span class='info_1'><a href='product.php'>商品情報</a></span>
                <span class='info_2'><a href='contacts.php'>お問い合わせ</a></span>
                <span class='info_3'><a href='admin_logout.php'>ログアウト</a></span>
                <span class='info_2'><a href='admin_index.php'>TOPページへ</a></span>
                <span class='info_2'><a href='carts.php'>カート</a></span>
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
        
        <div class='customer'>振込み先情報</div>
        
        <form method='POST' action='registration_transfer.php' enctype="multipart/form-data">
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>銀行名</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='bank_name' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>支店名</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='branch_name' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>預金科目</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='account' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>口座番号</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='NO' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>口座名義人(カナ)</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='kana_name' class='form-control'/>
                    </div>
            </div>
            <div class='enroll_1'>
                <input type='submit' value='登録'/>
            </div>
            <p>現在の口座情報</p>
            <p><?= $get_bank->bank_name ?>    <?= $get_bank->branch_name ?></p>
            <p><?= $get_bank->account ?>    <?= $get_bank->NO ?></p>
            <p><?= $get_bank->kana_name ?></p>
            
            
        </form>
        <div class=corporation_1><a href='administrator.php'>管理者ページへ</a></div>
        
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
