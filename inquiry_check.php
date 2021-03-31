<?php
    // ログインフィルター
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'contact_dao.php';
    // セッション開始
    // session_start();
    // idをGETで取得
    // $idをnullにする
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // お客側問い合わせフォームから受け取る
    $contacts = ContactDAO::get_all_contacts();
    // var_dump($contacts);
    // 
    
?>


<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>お問い合わせ確認</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid sticky-top'>
            <div class='row  header '>
                <a href='admin_index.php' class='logo'><span class='col-lg-2 '>KURIADELE</span></a>
                <span class='col-lg offset-1 col-lg-1 px-0'></span>
                <span class='col-lg-4 px-0 span_a'>
                    <a href='admin_index.php' class='span_a'>管理者TOP</a>
                    <a href='index.php' class='span_a'>顧客TOP</a>
                    <a href='admin_logout.php' class='span_a'>ログアウト</a>
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
        <div class='customer'>お問い合わせ確認</div>
        
        
        <!--PHP入る-->
        <?php foreach($contacts as $contact): ?>
            <h6 class='inquiry_id'><?= $contact->id ?></h6>
            <div class='inquiry'>
                <p>お名前：&emsp;&emsp;<?= $contact->name ?></p>
                <p>件名：&emsp;&emsp;&emsp;<?= $contact->subject ?></p>
                <p>内容：&emsp;&emsp;&emsp;<?= $contact->contact ?></p>
                <p>返信メールアドレス：&emsp;<?= $contact->email_address ?></p>
            </div>
        <?php endforeach; ?>
        
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
