<?php
    //外部ファイル読込
    require_once 'item_dao.php';
    require_once 'customer.php';
    // セッション開始
    // session_start();
    // print 'OK';
    $id = null;
    // $idをGETで取得
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // 選択された商品情報を取得
    $item = ItemDAO::get_item_by_id($id);
    // var_dump($item);
    // カートに入れたい場合の場合分け
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
            
            
        </form>
        <?php ?>
        <?php endif; ?>
        
        
        
        <h6 class='buy_2'>これより先はログイン後お手続きくださいませ。</h6>
        
        
        
        <div class='footer '>
            <ul><span>KURIADELEについて</span><br>
                <li><a href='company_philosophy.php'>企業紹介</a></li>

            </ul>
            <ul><span>取扱商品</span>
                <li><a href='product.php'>商品一覧</a></li>
            </ul>
            <ul><span>サポート</span>
                <li><a href='contact.php'>お問い合わせ</a></li>

            </ul>
            <!--<ul><span>SNSアカウント</span>-->
            <!--</ul>-->
            
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</thml>
