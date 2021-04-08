<?php
    // ログインしていない状態で管理者トップへアクセスするのを防ぐ
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_dao.php';
    // セッション開始
    // session_start();
    // 管理者の情報をセッションに保存
    $login_admin = $_SESSION['login_admin'];
    // 銀行口座入力エラーがある場合のメッセージを表示
    $error_message = $_SESSION['error_message'];
    // 破棄
    $_SESSION['error_message'] = null;
    // var_dump($error_message);
    // 銀行口座を登録した際 bank_message をセッションから取得・表示
    $bank_message = $_SESSION['bank_message'];
    // var_dump($bank_message);
    // 1度のみ表示
    $_SESSION['bank_message'] = null;
    // idをGETで取得
    // $idをnullにする
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 現在の口座情報を表示する
    $get_bank = AdminDAO::get_bank_by_id($id);
    // var_dump($get_bank);
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
        <div class='container-fluid sticky-top'>
            <div class='row header'>
                <a href='index.php' class='logo'><span class='col-lg-2 '>KURIADELE</span></a>
                <span class='offset-lg-4 col-lg-3 px-0 span_a'>
                    <a href='administrator.php' class='span_b'>管理ページへ</a>
                    <a href='index.php' class='span_b'>顧客TOP</a>
                    <a href='admin_logout.php' class='span_b'>ログアウト</a>
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
        
        <div class='customer'>振込み先情報</div>
        <!--$error_message がnullでないならば-->
        <?php if($error_message !== null): ?>
            <?php foreach($error_message as $errors): ?>
                <!--$error_message  表示する-->
                <p><?= $errors ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <!-- $bank_message がnullでないならば-->
        <?php if($bank_message !== null): ?>
        <!--$bank_message 表示する-->
            <P><?= $bank_message ?></P>
        <?php endif; ?>
        
        <form method='POST' action='registration_transfer.php' enctype="multipart/form-data">
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>銀行名</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='bank_name' class='form-control' placeholder='<?= $get_bank->bank_name ?>' />
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>支店名</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='branch_name' class='form-control' placeholder='<?= $get_bank->branch_name ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>預金科目</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='account' class='form-control' placeholder='<?= $get_bank->account ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>口座番号</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='NO' class='form-control' placeholder='<?= $get_bank->NO ?>'/>
                    </div>
            </div>
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>口座名義人(カナ)</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='kana_name' class='form-control' placeholder='<?= $get_bank->kana_name ?>'/>
                    </div>
            </div>
            <div class='top_d'>
                <input type='submit' value='登録' class='btn-gradient'/>
            </div>

            
        </form>
        
        
        <div class='footer '>
            <ul><span>KURIADELEについて</span><br>
                <li><a href='company_philosophy.php'>企業紹介</a></li>

            </ul>
            <ul><span>取扱商品</span>
                <li><a href='product.php'>商品一覧</a></li>
            </ul>
            <ul><span>サポート</span>
                <li><a href='contacts.php'>お問い合わせ</a></li>

            </ul>
            <!--<ul><span>SNSアカウント</span>-->
            <!--</ul>-->
            
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</thml>