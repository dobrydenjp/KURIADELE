<?php
    // 外部ファイル読込
    require_once 'contact.php';
    
    // データベースを扱う便利屋さん
    class ContactDAO{
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
        
        // 問い合わせ内容を1件登録するメソッド
        public static function insert($contacts){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（データはわざとあやふやにしておく）
               $stmt = $pdo -> prepare("INSERT INTO items (name, subject, contact, email_address) VALUES(:name, :subject, ;contact, ;email_address)");
                
                // バインド処理（あやふやだった箇所実データで埋める）
                $stmt->bindParam(':name', $contacts->name, PDO::PARAM_STR);
                $stmt->bindParam(':subject', $contacts->subject, PDO::PARAM_STR);
                $stmt->bindParam(':contact', $contacts->contact, PDO::PARAM_STR);
                $stmt->bindParam(':email_address', $contacts->email_address, PDO::PARAM_STR);
                
                // INSERT文本番実行
                $stmt->execute();
    
                return $contacts;
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
    }
?>