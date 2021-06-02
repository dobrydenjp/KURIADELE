<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>お客様一覧</title>
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
            <p class='customer'>お客様情報</p>
            <table class='container-fluid list table col-lg-6 col-6'>
                <div class='row'> 
                    <tbody>
                        <tr>
                            <th class='top_c'>お名前</th><td><h6><?= $customer->name ?></h6></td>
                        </tr>
                        <tr>
                            <th class='top_c'>カタカナ</th><td><h6><?= $customer->kana_name ?></h6></td>
                        </tr>
                        <tr>
                            <th class='top_c'>郵便番号</th><td><h6><?= $customer->postal_code ?></h6></td>
                        </tr>
                        <tr>
                            <th class='top_c'>住所</th><td><h6><?= $customer->address ?></h6></td>
                        </tr>
                        <tr>
                            <th class='top_c'>お電話番号</th><td><h6><?= $customer->tel ?></h6></td>
                        </tr>
                        <tr>
                            <th class='top_c'>メールアドレス</th><td><h6><?= $customer->email_address ?></h6></td>
                        </tr>
                        <tr>
                            <th class='top_c'>パスワード</th><td><h6><?= $customer->password ?></h6></td>
                        </tr>
                    </tbody>
                </div>
            </table>
        </p>
        <div class='customer'>購入済み商品一覧</div>
        <table class='container-fluid list table col-lg-6'>
            <div class='row'>
                <tbody>
                    <?php foreach($my_purchases as $cart): ?>
                        <tr>
                            <td class='table_td'>商品番号：<?= $cart->get_item()->id ?></td>
                            <td class='table_img'><img src='upload/items/<?= $cart->get_item()->image ?>' class='img_td'></img></td>
                            <td class='table_td'>商品名：<?= $cart->get_item()->name ?></td>
                            <td class='table_td'>購入日時：<?= $cart->created_at ?></td>
                            <td class='table_td'>購入個数: <?= $cart->number ?>個</td>
                            <td class='table_td'>金額：<?= $cart->get_item()->price ?>円</td>
                        </tr>
                    <?php endforeach; ?>
               </tbody>
            </div>
        </table>
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
