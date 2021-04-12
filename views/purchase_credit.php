<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>購入手続き(クレジットカード)</title>
        <link rel='stylesheet' href='index.css'>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class='col-12'>
            <div class='header'>
        
                <span class='com'>KURIADELE</span>
                
                <span class='info_1'><a href='product.php'>商品情報</a></span>
                <span class='info_2'><a href='contacts.php'>お問い合わせ</a></span>
                <span class='info_2'><a href='login.php'>ログイン</a></span>
                <span class='info_2'><a href='index.php'>TOPページへ</a></span>
                <span class='info_2'><a href='cart.php'>カート</a></span>
                <span class='info'>
                    <form method='POST' action='送信先'>
                        <input type='text' name=''/><input type='submit' name='' value='検索'/>
                    </form>
                </span>
            
                <div class='dropdown-menu_button'>
                    <button type='button' class='btn btn-light dropdown-toggle' data-toggle='dropdown'>
                    </button>
                    <div class='dropdown-menu'>
                        <a class='dropdown-item' href='#'><a href='company.php'>KURIADELEについて</a>
                        <a class='dropdown-item' href='#'><a href='product.php'>取扱商品</a>
                        <a class='dropdown-item' href='#'><a href='contact.php'>サポート</a>
                    </div>
                </div>
            </div>
        </div>
        <div class='customer'>ご購入手続き</div>
        
            <div class='buy_1'>支払方法はクレジットカードのみです</div>
            <div class='container'>
                <div class='buy_1'>決済カード情報</div>
                    <form class='' method='POST' action='check.php'>
                        <div class='form-group row'>
                            
                            <label class=' col-2 offset-3 col-form-label'>カード番号 *</label>
                                <div class='col-3 '>
                                    <input type="text" id='card-number' class='form-control' required/>
                                </div>
                            
                        </div>
                       
                        <div class='form-group row'>
                            <label class='col-2 offset-3 col-form-label'>セキュリティコード *</label>
                                <div class=' col-2 '>
                                    <input type="text" id='cvc' class='form-control' required/>
                                </div>
                            
                        </div>
                
                        <div class='form-group row'>
                            <label class='col-2 offset-3 col-form-label'>カード有効期限 *</label>
                                <div class='col-2 '>
                                <!--<label class='col-2 col-form-label'>-->
                                    月<input type="text" id='exp_month' placeholder='7' class='form-control' required/>
                                <!--</label>-->
                            </div>
                                <div class='col-2'>
                                <!--<label class='col-2 col-form-label'>-->
                                    年<input type="text" id='exp_year' placeholder='2021' class='form-control' required/>
                                <!--</label>-->
                            
                                
                                </div>
                        </div>
                
                        <div class='form-group row'>
                            <label class='col-2 offset-3 col-form-label'>カード名義 *</label>
                            <div class='col-4 '>
                                <input type="text" id='card-name' placeholder='TARO YAMADA' class='form-control'/>
                            </div>
                        </div>
                        <label class='col-2 offset-5 col-form-label'>
                            <input type='submit' value='確認する'/>
                        </label>
                    </form>    
            </div>    
        <div class='footer '>
            <ul><span>KURIADELEについて</span><br>
                <li><a href='login_company.php'>企業紹介</a></li>

            </ul>
            <ul><span>取扱商品</span>
                <li><a href='login_product.php'>商品一覧</a></li>
            </ul>
            <ul><span>サポート</span>
                <li><a href='login_contact.php'>お問い合わせ</a></li>
                <li><a href='login_change.php'>お客様情報変更</a></li>
            </ul>
        </div>
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js' integrity='sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV' crossorigin='anonymous'></script>
    </body>
</html>
