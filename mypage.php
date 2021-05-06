<?php
    // ログイン者の個人情報変更できるできるようにする
    // ログインしていない状態で管理者トップへアクセスするのを防ぐ
    // ログインフィルター
    require_once 'login_filter.php';
    // 外部ファイル読込
    require_once 'daos/customer_dao.php';
    require_once 'admin_daos/news_dao.php';
    require_once 'daos/item_dao.php';
    // セッション開始
    // session_start();
    // login_checkよりlogin_messsage をセッションから取得
    $login_message = $_SESSION['login_message'];
    // ログイン者の情報  セッションに保存
    $login_customer = $_SESSION['login_customer'];
    // idをnullにする
    // GETでid取得
    $id = null;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    // データベースから全商品を取得
    $items = ItemDAO::get_all_items();
    // 表示したい画像をさいころを振って決める
    $rand = mt_rand(0, count($items) - 1);
    // print $rand;
    $items = $items[$rand];
    // newsの情報取得
    $news = NewsDAO::get_news_id($id);
    // viewファイルの表示
    include_once 'views/mypage_view.php';
?>