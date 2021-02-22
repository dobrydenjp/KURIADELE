<?php
    require_once 'login_filter.php';
    require_once 'item_dao.php';
    require_once 'customer.php';
    // print 'OK';
    $id = $_GET['id'];
    // print $id;
    
    session_start();
    $item = ItemDAO::get_item_by_id($id);
    // var_dump($item);
    
    $login_customer = $_SESSION['login_customer'];
?>
<!doctype html>
<thml lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>商品情報</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='col-12'>
            <div class='header'>
        
                <span class='com'>KURIADELE</span>
                
                <span class='info_1'><a href='product.php'>商品情報</a></span>
                <span class='info_2'><a href='contact.php'>お問い合わせ</a></span>
                <span class='info_2'><a href='login.php'>ログイン</a></span>
                <span class='info_2'><a href='index.php'>TOPページへ</a></span>
        
                <span class='info'>
                    <form method='POST' action='送信先'>
                        <input type='text' name=''/><input type='submit' name='' value='検索'/>
                    </form>
                </span>
            
                <div class='dropdown-menu_button'>
                    <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown'>
                    </button>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' href='#'><a href='corporate_philosophy.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>
                    </div>
                </div>
            </div>
        </div>
        
        <p class='customer'>商品情報</p>
        
        <div class='product_1'>
            <a><?= $item->id ?></a>
            <img src='upload/items/<?= $item->image ?>' class='product_2'></img>
            <div class='product_3'><?= $item->name  ?>          ￥<?= $item->price ?></div>
            <div><?= $item->description ?></div>
        </div>
        
        <!--$login_customerがnull空でない時に実行-->
        <?php if($login_customer !== null): ?>
        <form method='POST' action='cart_in.php'>    
            <select class='select_box' name="number">
                <?php for($i = 1; $i <= $item->stock; $i++): ?>
                <option value='<?= $i ?>'><?= $i ?></option>
                <?php endfor; ?>
            個</select>
            <!--ＰＨＰ入力-->
            <input type="hidden" name="item_id" value="<?= $item->id ?>">
            <input type='submit' value='カートに入れる'>
            <!--<p class='product_4'></p>-->
        </form>
        <?php ?>
        <?php endif; ?>
        
        
        
        
        
        
        
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
