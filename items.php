<?php
    
    require_once 'item_dao.php';
    $items = ItemDAO::get_all_items();
    session_start();
?>

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
        <div class='col-lg-12'>
            <div class='header row'>
        
                <a href='index.php' class='logo'><span class='com'>KURIADELE</span></a>
                
                <span class='info_1'><a href='items.php'>商品情報</a></span>
                <span class='info_2'><a href='contacts.php'>お問い合わせ</a></span>
                <span class='info_3'><a href='login.php'>ログイン</a></span>
                
                
                
                <span class='info'>
                    <form method='POST' action='送信先'>
                        <input type='text' name=''/><input type='submit' name='' value='検索'/>
                    </form>
                </span>
            
                <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown'>
                </button>
                <!--<div class='dropdown-menu'>-->
                <!--    <a class='dropdown-item' href='#'><a href='corporate_philosophy.php'>KURIADELEについて</a>-->
                <!--    <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>-->
                <!--    <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>-->
                <!--</div>-->
            </div>
        </div>
        
        <div class='customer'>取り扱い商品<br>一覧</div>
        
        
        
        <?php foreach($items as $item): ?>
            <form method='POST' action='item_new.php'>
                <div class='product_1'>
                
                    <a><?= $item->id ?></a>
                    <img src='upload/items/<?= $item->image ?>' class='product_2'></img>
                    <div class='product_3'><?= $item->name  ?>          ￥<?= $item->price ?></div>
                    <p class='product_4'><a href='item_show.php?id=<?= $item->id ?>'>詳細ページへ</a></p>
                                                            <!--idの情報で詳細ページへ飛べると思いました-->
            
                </div>
            </form>
        <?php endforeach; ?>
        
        <!--<div class='product_1'>-->
            
        <!--    <img src='camera_4.jpg' class='product_2'></img>-->
            
        <!--    <div class='product_3'><?  ?>Canon 一眼レフカメラ　　　　　　￥45,000</div>-->
        <!--    <p class='product_4'><input type='button' onclick="location.href='buy.php'"value='カートに入れる'></p>-->
        <!--</div>-->
        
        
        <!--<div class='product_1'>-->
            
        <!--    <img src='camera_4.jpg' class='product_2'></img>-->
            
        <!--    <div class='product_3'><?  ?>Canon 一眼レフカメラ　　　　　　￥45,000</div>-->
        <!--    <p class='product_4'><input type='button' onclick="location.href='buy.php'"value='カートに入れる'></p>-->
                
        
        <!--</div>-->
        
        
        <!--<div class='product_1'>-->
            
        <!--    <img src='camera_4.jpg' class='product_2'></img>-->
            
        <!--    <div class='product_3'><?  ?>Canon 一眼レフカメラ　　　　　　￥45,000</div>-->
        <!--    <p class='product_4'><input type='button' onclick="location.href='buy.php'"value='カートに入れる'></p>-->
                
        
        <!--</div>-->
        
        
        <!--<div class='product_1'>-->
            
        <!--    <img src='camera_4.jpg' class='product_2'></img>-->
            
        <!--    <div class='product_3'><?  ?>Canon 一眼レフカメラ　　　　　　￥45,000</div>-->
        <!--    <p class='product_4'><input type='button' onclick="location.href='buy.php'"value='カートに入れる'></p>-->
                                                            <!--form??-->
        
        <!--</div>-->
        
        
        
        
        
        
 
 
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
