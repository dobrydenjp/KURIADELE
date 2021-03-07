<?php
    // 外部ファイル読込
    require_once 'admin.php';
    require_once 'bank.php';
    // 企業情報変更についてのＤＡＯ
    class AdminDAO{
        // データベースと接続を行うメソッド
        private static function get_connection(){
            
            // データベース接続情報      
            $dsn = "mysql:host=localhost;dbname=KURIADELE";
            $db_username = "root";
            $db_password = "";
        
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
        private static function close_connection($pdo, $stmp){
            // 神様さようなら
            $pdo = null;
            // 実行結果さようなら
            $stmp = null;
        }
        
        
        
        // メールアドレスとパスワードによって、管理者情報を取得する
        public static function get_admin($email_address, $password){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行する準備（メールアドレス、パスワードはわざとあやふやにしておく）
                $stmt = $pdo -> prepare("SELECT * FROM admins WHERE email_address=:email_address AND password=:password");
                // バインド処理（あやふやだったメールアドレス、パスワードを実データで埋める）
                $stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                
                // SELECT文本番実行
                $stmt->execute();
                
                // フェッチの結果を、Adminクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Admin');
                // 顧客情報をadminクラスのインスタンスで取得
                $admin = $stmt->fetch();
    
                return $admin;
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp);
            }
        }
        // 管理者　銀行口座を1件登録するメソッド

        public static function insert($bank){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（名前、年齢はわざとあやふやにしておく）
                $stmt = $pdo -> prepare("INSERT INTO bank (bank_name, branch_name, account, NO , name) VALUES (:bank_name, :branch_name, :account, :NO , :kana_name)");
                
                // バインド処理（あやふやだった名前、年齢を実データで埋める）
                $stmt->bindParam(':bank_name', $bank->bank_name, PDO::PARAM_STR);
                $stmt->bindParam(':branch_name', $bank->branch_name, PDO::PARAM_STR);
                $stmt->bindParam(':account', $bank->account, PDO::PARAM_STR);
                $stmt->bindParam(':NO ', $bank->NO, PDO::PARAM_INT);
                $stmt->bindParam(':kana_name', $bank->kana_name, PDO::PARAM_STR);
                
                // INSERT文本番実行
                $stmt->execute();
    
                return $bank;
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
                self::close_connection($pdo, $stmp);
            }
        
        }
    }    
?> 