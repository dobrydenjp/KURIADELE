<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>企業情報  商品情報変更</title>
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
                        <a class='dropdown-item' href='#'><a href='company_philosophy.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                    </div>
                </span>
            </div>
        </div>
        <p class=customer>商品情報登録</p>
        <!--商品登録ができない場合のメッセージ表示-->
        <?php if($error_message !== null): ?>
            <?php foreach($error_message as $error): ?>
                <p class='error_message'><?= $error ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <!--商品登録完了したメッセージ表示-->
        <form method='POST' action='item_new.php' enctype="multipart/form-data">
            <div class='customer_information form-group row '>
                <label class='col-lg-4 col-form-label'>商品名</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='name' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>商品画像</label>
                    <div class='col-lg-4 col-12'>
                        <input type='file' name='image'>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                <label class='col-lg-4 col-form-label'>金額</label>
                    <div class="col-lg-4 col-12">
                        <input type='text' name='price' class='form-control'/>
                    </div>
            </div>
            <div class='customer_information form-group row'>
                <label class='col-lg-4 col-form-label'>在庫数</label>
                    <div class='col-lg-4 col-12'>
                        <input type="text" name="stock" class='form-control'/>
                    </div>
            </div>
            
            <div class='customer_information form-group row'>
                 <label class='col-lg-4 col-form-label'>商品説明</label>
                    <div class='col-lg-4 col-12'>
                        <input type='text' name='description' class='form-control'/>
                    </div>
            </div>
            <div class='enroll_1'>
                <input type='submit' value='登録'/>
            </div>
        </form>
        <p class='customer'>登録内容確認</p>
        <!--商品を公開・非公開にしたメッセージ表示-->
        <p class='message'><?= $flash_message ?></p>
        <table class='container-fluid table col-lg-6'>
            <div class='row'>
                <tbody>
                    <?php foreach($items as $item): ?>
                    <tr>
                        <td class='table_td'>商品番号：&emsp;<?= $item->id ?></td>
                        <td class='table_td'>
                            <button>
                                <a href='item_change.php?id=<?= $item->id ?>' >変更する</a>
                            </button>
                                
                        </td>
                        <td class='table_img'><img src='upload/items/<?= $item->image ?>' class='img_td'></img></td>
                        <td class='table_td'>商品名：&emsp;<?= $item->name ?></td>
                        <td class='table_td'>在庫：&emsp;&emsp;<?= $item->stock ?>個</td>
                        <td class='table_td'>金額：&emsp;&emsp;￥<?= $item->price ?></td>
                        <td class='table_td'>商品説明：&emsp;<?= $item->description ?></td>
                        <td class='table_td'>
                            <!--商品が表示されていない（0の）場合に実行-->
                            <?php if((int)($item->flag) === 0): ?>
                                <form method='POST' action='flag.php' class='select_td'>
                                    <input type='submit' value='公開にする' class='button'/>
                                    非公開中です。
                                    <input type='hidden' name='flag' value='1'>
                                    <input type='hidden' name='id' value='<?= $item->id ?>'>
                                </form>
                            <?php else: ?>
                                <form method='POST' action='flag.php' class='select_td'>
                                    <input type='submit' value='非公開にする' class='button'/>
                                    公開中です。
                                    <input type='hidden' name='flag' value='0'>
                                    <input type='hidden' name='id' value='<?= $item->id ?>'>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </div>
        </table>
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
