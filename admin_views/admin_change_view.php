<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>企業情報 商品情報変更</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid sticky-top'>
            <div class='row header'>
                <a href='admin_index.php' class='logo'><span class='col-lg-2 '>KURIADELE</span></a>
                <span class='offset-lg-4 col-lg-3 px-0 span_a'>
                    <a href='administrator.php' class='span_b'>管理ページへ</a>
                    <a href='index.php' class='span_b'>顧客TOP</a>
                    <a href='admin_logout.php' class='span_b'>ログアウト</a>
                </span>    
                <span class='col-lg-1 px-0 info'>
                    <form method='GET' action='admin_search.php' class='info'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='admin_company.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='admin_product.php'>取扱商品</a>
                    </div>
                </span>
            </div>
        </div>
        <p class=customer>現在の登録</p>
        <?php if($flash_message !== null): ?>
            <p class='message'><?= $flash_message ?></p>
        <?php endif; ?>
        <table class='container-fluid table col-lg-6'>
            <div class='row'>
                <tbody>
                    <td class='table_td'>商品番号：&emsp;<?= $item->id ?></td>
                    <td class='table_img'><img src='upload/items/<?= $item->image ?>' class='img_td'></img></td>
                    <td class='table_td'>商品名：&emsp;<?= $item->name ?></td>
                    <td class='table_td'>在庫：&emsp;&emsp;<?= $item->stock ?>個</td>
                    <td class='table_td'>金額：&emsp;&emsp;￥<?= $item->price ?></td>
                    <td class='table_td'>商品説明：&emsp;<?= $item->description ?></td>
                    <td class='table_td'>
                    <?php if(($item->flag) === 0): ?>
                    <p>非公開中</p>
                    <input type='hidden' name='flag' value='<?= $item->flag ?>'/>
                    <?php else: ?>
                    <p>公開中</p>
                    <input type='hidden' name='flag' value='<?= $item->flag ?>'/>
                    <?php endif; ?>
                    </td>
                </tbody>
            </div>
        </table>
        <p class=customer>商品情報変更</p>
        
        <p class='login_2'>どの様に変更されますか？？</p>
        <form method='GET' action='item_update.php' enctype="multipart/form-data">
            <div class='customer_information form-group row'>
                <label class='col-lg-4 col-form-label'>在庫数</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='stock' value='<?= $item->stock ?>' class='form-control'/>
                        <input type='hidden' name='id' value='<?= $item->id ?>'/>
                    </div>
            </div>
            <div class='enroll_1'>
                <input type='submit' value='登録'/>
            </div>
        </form>
        <div class='footer '>
            <ul><span>KURIADELEについて</span><br>
                <li><a href='admin_company.php'>企業紹介</a></li>
            </ul>
            <ul><span>取扱商品</span>
                <li><a href='admin_product.php'>商品一覧</a></li>
            </ul>
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</html>
