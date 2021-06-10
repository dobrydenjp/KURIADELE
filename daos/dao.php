<?php

    // データベースを扱う便利屋さん
    class DAO{
        // データベースと接続を行うメソッド
        protected static function get_connection(){
            
            // データベース接続情報      
            $dsn = "mysql:host=mysql1.php.xdomain.ne.jp;dbname=dobryden_kuriadele";
            $db_username = "dobryden_kd";
            $db_password = "Hku1110ri";
            
            // $dsn = "mysql:host=localhost;dbname=KURIADELE";
            // $db_username = "root";
            // $db_password = "";
        
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // 失敗したら例外を投げる
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,   //デフォルトのフェッチモードはクラス
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',   //MySQL サーバーへの接続時に実行するコマンド
            );
        
            // データベースを扱う万能の神様誕生
            $pdo = new PDO($dsn, $db_username, $db_password, $options);
            
            // 神様はいあげる
            return $pdo;
        }
    
        // データベースとの切断を行うメソッド
        protected static function close_connection($pdo, $stmp){
            // 神様さようなら
            $pdo = null;
            // 実行結果さようなら
            $stmp = null;
        }
    
    }
    
?>