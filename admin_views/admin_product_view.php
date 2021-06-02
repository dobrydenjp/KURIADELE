<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>商品一覧ページ</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid header fixed-top'>
            <div class='row'>
                <span class='col-lg-2 col-md-2 col-auto'>
                    <a href='admin_index.php'><h1>KURIADELE</h1></a>
                </span>
                <span class='col-lg-7 col-md-5 d-none d-lg-block span_a'>
                    <a href='administrator.php' class='span_b'>管理ページへ</a>
                    <a href='index.php' class='span_b'>顧客TOP</a>
                    <a href='admin_logout.php' class='span_b'>ログアウト</a>
                </span>
                <div class='col-lg-3 col-md-5 col-auto span_c'>
                    <form method='GET' action='admin_search.php'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                    <button type="button" class="btn btn-light dropdown-toggle d-none d-sm-block" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='admin_company.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='admin_product.php'>取扱商品</a>
                    </div>
                </div>
            </div>
        </div>
        <p class='body'>
            <p class='customer'>取り扱い商品一覧</p>
            <!--キーワードに類似した商品を表示したメッセージ表示-->
            <?php if($flash_message !== ''): ?>
                <p class='message'><?= $flash_message ?></p>
            <?php endif; ?>
            <table class='container-fluid table col-lg-6'>
                <div class='row'>
                    <tbody>
                        <?php foreach($items as $item): ?>
                        <tr>
                            <td class='table_td'><?= $item->id ?></td>
                            <td class='table_img'><img src='upload/items/<?= $item->image ?>' class='img_td'></img></td>
                            <td class='table_td'>商品名：&emsp;<?= $item->name ?></td>
                            <td class='table_td'>在庫：&emsp;&emsp;<?= $item->stock ?>個</td>
                            <td class='table_td'>金額：&emsp;&emsp;￥<?= $item->price ?></td>
                            <td class='table_td'>商品説明：&emsp;<?= $item->description ?></td>
                            <form method='POST' action='item_new.php'>
                                <td class='table_td'> <a href='admin_buy.php?id=<?= $item->id ?>'>詳細ページへ</a></td>
                            </form>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </div>
            </table>
        </p>
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