<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>TOPページ</title>
        <link rel='stylesheet' href='index.css'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' integrity='sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z' crossorigin='anonymous'>
    </head>
    <body>
        <div class='container-fluid header fixed-top'>
            <div class='row'>
                <span class='col-lg-2 col-md-2 col-auto'>
                    <a href='index.php'><h1>KURIADELE</h1></a>
                </span>
                <span class='col-lg-7 col-md-5 d-none d-lg-block span_a'>
                    <a href='product.php 'class='span_b'>商品情報</a>
                    <a href='contact.php'class='span_b'>お問い合わせ</a>
                    <a href='login.php'class='span_b'>ログイン</a>
                </span>
                <div class='col-lg-3 col-md-5 col-auto span_c'>
                    <form method='GET' action='search.php'>
                        <input type='search' name='name' size='15'/>
                        <input type='submit' value='検索'/>
                    </form>
                    <button type="button" class="btn btn-light dropdown-toggle d-none d-sm-block" data-toggle="dropdown"></button>
                        <div class="dropdown-menu">
                            <a class='dropdown-item' href='#'><a href='company.php'>KURIADELEについて</a>
                            <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                            <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>
                        </div>
                </div>
            </div>
        </div>
        <div><img src='sakura.jpg' alt='camera' class='image_sakura'></img></div>
        <!--ログアウトメッセージ表示-->
        <?php if($flash_message !== null): ?>
            <p class='message'><?= $flash_message ?></p>
        <?php endif; ?>
        <div class='top_2'>
            <h4 class='customer'>取扱商品</h4>
            <p class='top_c'><a href='product.php'><img src='upload/items/<?= $items->image ?>' class='img_top'></img></a></p>
        </div>
        <div class='top_3'>
            <h4 class='customer'>KURIADELEnews</h4>
            <h4 class='top_d'>KURIADELE最新ニュース</h1>
            <h5 class='top_e'><?= $news->days ?>&ensp;&ensp;<?= $news->news ?></h4>
        </div>
        <div class='container-fluid footer'>
            <div class='row'>
                <ul><span class='col-lg-4'>KURIADELEについて</span><br>
                    <li><a href='company.php'>企業紹介</a></li>
                </ul>
                <ul><span class='col-lg-4'>取扱商品</span>
                    <li><a href='product.php'>商品一覧</a></li>
                </ul>
                <ul><span class='col-lg-4'>サポート</span>
                    <li><a href='contact.php'>お問い合わせ</a></li>
                </ul>
            </div>  
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</html>
