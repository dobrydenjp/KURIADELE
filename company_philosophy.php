<?php
    // 外部ファイル読込
    require_once 'company_dao.php';
    // セッション開始
    session_start();
    // idをGETで取得
    // $idをnullにする
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 現在の企業情報表示
    $company = CompanyDAO::get_companys_id($id);
    // var_dump($company);

?>

<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>企業情報</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid'>
            <div class='row  header '>
                <a href='index.php' class='logo'><span class='col-auto'>KURIADELE</span></a>
                
                <span class='offset-3 col-auto'><a href='product.php'>商品情報</a></span>
                <span class='col-auto '><a href='contacts.php'>お問い合わせ</a></span>
                <span class='col-auto '><a href='login.php'>ログイン</a></span> 
                <span class='info'>
                    <form method='POST' action='送信先'>
                        <input type='text' name=''/><input type='submit' name='' value='検索'/>
                    </form>
                </span>
           
                <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown'></button>
                <div class='dropdown-menu'>
                    <a class='dropdown-item' href='#'><a href='corporate_philosophy.php'>KURIADELEについて</a>
                    <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                    <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>
                </div>
            </div>
        </div>
        
        <div ><p class=customer>企業情報</p></div>
        
        
        
        
        <div class=corporation>KURIADELEとは</div><label  class=corporation><?= $company->description ?></label>
        <div class=corporation>代表挨拶</div><label class=corporation><?= $company->greeting ?></label>
        <div class=corporation>事業計画</div><label class=corporation><?= $company->plan ?></label>
        
        
                                
        
        
        <div class='footer '>
            <ul><span><a href='company_philosophy.php'>KURIADELEについて</a></span><br>
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
