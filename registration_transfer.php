<?php
    // 外部ファイル読込
    require_once 'admin_dao.php';
    // セッション開始
    // session_start();
    // var_dump($_POST);
    // なんで
    // array (size=1)
    // 'name' => string '' (length=0)のみなのか
    $_POST = [];
    // var_dump($_POST);
    // // 入力情報を保存
    $bank_name = $_POST['bank_name'];
    $branch_name = $_POST['branch_name'];
    $account = $_POST['account'];
    $NO  = $_POST['NO '];
    $kana_name = $_POST['kana_name'];
    
    $bank = new Bank($bank_name, $branch_name, $account, $NO , $kana_name);
    adminDAO::insert($bank);
    var_dump($bank);
    // // sqlに銀行情報保存する
    // class daoを使う
    // 管理者が振込先を入力
    // お客さん側の購入　支払銀行確認する場所に反映

?>
<!--<!doctype html>-->
<!--<html lang='ja'>-->
<!--    <head>-->
<!--        <meta charset='UTF-8'>-->
<!--        <title>管理者ページ</title>-->
<!--        <link rel='stylesheet' href='index.css'>-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
<!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">-->
<!--    </head>-->
<!--    <body>-->
<!--        <div class='col-lg-12'>-->
<!--            <div class='header row'>-->
        
<!--                <span class='com'>KURIADELE</span>-->
<!--                <span class='info_1'><a href='product.php'>商品情報</a></span>-->
<!--                <span class='info_2'><a href='contact.php'>お問い合わせ</a></span>-->
<!--                <span class='info_3'><a href='login.php'>ログイン</a></span>-->
<!--                <span class='info_2'><a href='index.php'>TOPページへ</a></span>-->
<!--                <span class='info_2'><a href='cart.php'>カート</a></span>-->
<!--                <span class='info'>-->
<!--                    <form method='POST' action='送信先'>-->
<!--                        <input type='text' name=''/><input type='submit' name='' value='検索'/>-->
<!--                    </form>-->
<!--                </span>-->
            
<!--                <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown'>-->
<!--                </button>-->
<!--                <div class='dropdown-menu'>-->
<!--                    <a class='dropdown-item' href='#'><a href='corporate_philosophy.php'>KURIADELEについて</a>-->
<!--                    <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>-->
<!--                    <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        
<!--        登録が完了しました-->
        
<!--        <div class='footer '>-->
<!--            <ul><span><a href='corporate philosophy.php'>KURIADELEについて</a></span><br>-->
<!--                <li>代表挨拶</li>-->
<!--                <li>事業計画</li>-->
<!--                <li>展望</li>-->
<!--            </ul>-->
<!--            <ul><span><a href='product.php'>取扱商品</a></span>-->
<!--                <li>商品一覧</li>-->
<!--            </ul>-->
<!--            <ul><span><a href='contact.php'>サポート</a></span>-->
<!--                <li>お問い合わせ</li>-->
<!--            </ul>-->
<!--            <ul><span>SNSアカウント</span>-->
<!--            </ul>-->
            
<!--        </div>-->
<!--    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>-->
<!--    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>-->
<!--    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>-->
<!--    </body>-->
<!--</thml>-->
