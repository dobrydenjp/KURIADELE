<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>買い物かご</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='container-fluid header fixed-top'>
            <div class='row'>
                <span class='col-lg-3 col-xs-5'>
                    <a href='mypage.php' class='logo'>KURIADELE</a>
                </span>
                <span class='col-lg-6 hidden-xs span_a'>
                    <a href='login_contact.php' class='span_b'>お問い合わせ</a>
                    <a href='login_product.php' class='span_b'>商品一覧</a>
                    <a href='cart.php' class='span_b'>カート</a>
                    <a href='purchases.php' class='span_b'>購入履歴</a>
                    <a href='logout.php' class='span_b'>ログアウト</a>
                </span>
                <div class='col-lg-3 col-xs-7 span_c'>
                    <form method='GET' action='login_search.php'>
                        <input type='search' name='name'/>
                        <input type='submit' value='検索'/>
                    </form>
                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class='dropdown-item' href='#'><a href='login_company.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='login_product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='login_contact.php'>サポート</a>
                    </div>
                </div>
            </div>
        </div>
        <p class='customer'>買い物かご</p>
        <!--商品をカートに追加-->
        <!--商品の個数変更-->
        <!--商品を削除-->
        <!--同一商品を追加メッセージ表示-->
        <?php if($flash_message !== null): ?>
            <p class='message'><?= $flash_message ?></p>
        <?php endif; ?>
        <!--$login_customerがnull空でない時に実行-->
        <?php if($login_customer !== null): ?>
            <table class='container-fluid table col-lg-6'>
                <div class='row'>
                    <tbody>
                        <!--商品をカートに入れた順番に商品を表示-->
                        <?php foreach($my_carts as $cart): ?>
                        <tr>
                            <td class='table_td'><?= $cart->id ?></td>
                            <td class='table_img'><img src='upload/items/<?= $cart->get_item()->image ?>' class='img_td'></img></td>
                            <td class='table_td'>商品名：<?= $cart->get_item()->name ?></p></td>
                            <td class='table_td'>商品説明：<?= $cart->get_item()->description ?></p></td>
                            <td class='table_td'>在庫数：<?= $cart->get_item()->stock ?></p></td>
                            <td class='table_td'>購入数：<?= $cart->number ?>&ensp;個</p></td>
                            <td class='table_td'>
                                <form method='POST' action='cart_update.php' class='select_td'>    
                                    <select name='number' class='select_box '>
                                        <?php for($i = 1; $i <= $cart->get_item()->stock; $i++): ?>
                                            <option value='<?= $i ?>'><?= $i ?></option>
                                        <?php endfor; ?>
                                    個</select>
                                    <input type='hidden' name='id' value='<?= $cart->id ?>'>
                                    <input type='hidden' name='item_id' value='<?= $cart->item_id ?>'>
                                    <input type='submit' value='変更' class='button'/>
                                </form>
                                <form method='POST' action='cart_delete.php' class='delete'>
                                    <input type='hidden' name='id' value='<?= $cart->id ?>'>
                                    <input type='submit' value='削除' class='button'/>
                                </form>
                            </td>
                            <td class='table_td'>小計：￥<?= $cart->number * $cart->get_item()->price ?>&ensp;円</td>
                        </tr>     
                        <?php endforeach; ?>
                    </tbody>            
                </div>
            </table>
            <div class='container-fluid table col-lg-7 table_money'>
                <p>合計金額：￥<?= CartDAO::get_total_price($my_carts) ?></p>
                <p>消費税込&ensp;合計金額：￥<?= CartDAO::get_total_price($my_carts)* 1.08 ?></p>
                <!--カート商品がない場合に実行-->
                <?php if(count($my_carts) > 0): ?>   
                    <form method='POST' action='purchase_new.php'>
                        <input type='hidden' name='id' value='<?= $cart->id ?>'>
                        <input type='submit' value='決定' class='btn-gradient'/>
                    </form>
                <?php else: ?>
                    <p class='top_d'>商品は入ってません。商品をカートに入れて下さい。</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class='container-fluid footer'>
            <div class='row'>
                <ul><span class='col-lg-4'>KURIADELEについて</span><br>
                    <li><a href='login_company.php'>企業紹介</a></li>
                </ul>
                <ul><span class='col-lg-4'>取扱商品</span>
                    <li><a href='login_product.php'>商品一覧</a></li>
                </ul>
                <ul><span class='col-lg-4'>サポート</span>
                    <li><a href='login_contact.php'>お問い合わせ</a></li>
                    <li><a href='login_change.php'>お客様情報変更</a></li>
                </ul>
            </div>  
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</html>
