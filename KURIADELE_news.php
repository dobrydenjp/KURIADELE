<?php
    // 外部ファイル読込
    require_once 'news_dao.php';
    // セッション開始
    session_start();
    // 入力項目エラーメッセージ表示
    $news_error = $_SESSION['news_error'];
    // 破棄
    $_SESSION['news_error'] = null;
    // var_dump($news_error);
    // 保存できた時のメッセージ表示
    $news_message = $_SESSION['news_message'];
    // 破棄
    $_SESSION['news_message'] = null;
    // var_dump($news_message);
    // GET通信
    $id = $_GET['id'];
    // newsの情報取得
    $news = NewsDAO::get_news_id($id);
    // var_dump($news);
?>

<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>KURIADELEnews</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='col-lg-12'>
            <div class='header row'>
        
                <a href='admin_index.php' class='logo'><span class='com'>KURIADELE</span></a>
                <span class='info_1'><a href='admin_index.php'>管理者TOP</a></span>
                <span class='info_2'><a href='index.php'>顧客TOP</a></span>
                <span class='info_3'><a href='admin_logout.php'>ログアウト</a></span>
        
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
        
        <div class='customer'>KURIADELEnews 更新</div>
        <?php if($news_error !== null): ?>
            <?php foreach($news_error as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        
        <?php if($news_message !== null): ?>
            <p><?= $news_message ?></p>
        <?php endif; ?>
        
        <p>現在の登録状況</p>
        
        <p><?= $news->days ?> <?= $news->news ?></p>
        
        <form method='POST' action='news.php' enctype="multipart/form-data">
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>日付<br>News</label>

                    <div class='col-lg-4 col-12'>
                        <input type='date' name='days' class='form-control'/>
                        <input type='text' name='news' class='form-control'/>
                    </div>
            </div>
        
            <div class='enroll_1'>
                <input type='submit' value='更新'/>
            </div>
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
