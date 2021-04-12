<!doctype html>
<thml lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>取り扱い商品一覧</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid sticky-top'>
            <div class='row header'>
                <a href='index.php' class='logo'><span class='col-lg-2 '>KURIADELE</span></a>
                <span class='offset-lg-4 col-lg-3 px-0 span_a'>
                    <a href='product.php 'class='span_b'>商品情報</a>
                    <a href='contact.php'class='span_b'>お問い合わせ</a>
                    <a href='login.php'class='span_b'>ログイン</a>
                </span>    
                
                <span class='col-lg-1 px-0 info'>
                    <form method='POST' action='search.php' class='info'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                
            
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='company.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>
                    </div>
                </span>
            </div>
        </div>
        
        <div class='customer'>取り扱い商品<br>一覧</div>
        
        
        
        <table class='container-fluid table col-lg-6'>
            <div class='row'>
                <tbody>
                    <?php foreach($items as $item): ?>
                    <tr>
                        <td class='table_td'><?= $item->id ?></td>
                        <td class='img_td'><img src='upload/items/<?= $item->image ?>' class='product_2'></img></td>
                        <td class='table_td'>商品名：&emsp;<?= $item->name ?></td>
                        <td class='table_td'>在庫：&emsp;&emsp;<?= $item->stock ?>個</td>
                        <td class='table_td'>金額：&emsp;&emsp;￥<?= $item->price ?></td>
                        <td class='table_td'>商品説明：&emsp;<?= $item->description ?></td>
                        <form method='POST' action='item_new.php'>
                            <td class='table_td'> <a href='buy.php?id=<?= $item->id ?>'>詳細ページへ</a></td>
                        </form>
                    </tr>
                        
                    
                    <?php endforeach; ?>
                </tbody>
            </div>
        </table>
        

        <div class='footer '>
            <ul><span>KURIADELEについて</span><br>
                <li><a href='company.php'>企業紹介</a></li>

            </ul>
            <ul><span>取扱商品</span>
                <li><a href='product.php'>商品一覧</a></li>
            </ul>
            <ul><span>サポート</span>
                <li><a href='contact.php'>お問い合わせ</a></li>
            </ul>
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</html>
