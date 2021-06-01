<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='UTF-8'>
        <title>購入手続き</title>
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
        <p class='customer'>ご購入手続き</p>
        <p class='buy_1'>支払方法はお振込みのみです</p>
        <p class='buy_1'>ご購入後、下記口座へお振込みをお願い致します。</p>
        <P class='customer_1'>お振込み口座</P>
        <table class='container-fluid table col-lg-4'>
            <div class='row'>
                <tbody>
                    <tr>
                        <th>銀行名<td class='table_td'><?= $get_bank->bank_name ?></td></th>
                    </tr>
                    <tr>
                        <th>支店名<td class='table_td'><?= $get_bank->branch_name ?></td></th>
                    </tr>
                    <tr>
                        <th>預金科目<td class='table_td'><?= $get_bank->account ?></td></th>
                    </tr>
                    <tr>
                        <th>口座番号<td class='table_td'><?= $get_bank->NO ?></td></th>
                    </tr>
                    <tr>
                        <th>口座名義人<td class='table_td'><?= $get_bank->kana_name ?></td></th>
                    </tr>
                </tbody>
            </div>
        </table>    
        <div class='top_c'>
            <p class='purchase'><a href='cart.php' class='btn-gradient'>カートへ戻る</a></p>
            <form action='check.php' method='GET' class='purchase'>
                
                <input type='submit' value='入力内容確認' class='btn-gradient'/>
            </form>
        </div>
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
