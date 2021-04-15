<?php
    // ログインしていない状態で管理者トップへアクセスするのを防ぐ
    require_once 'admin_login_filter.php';
    // 外部ファイル読込
    require_once 'admin_daos/admin_dao.php';
    // viewファイルの表示
    include_once 'admin_views/administrator_view.php';
?>