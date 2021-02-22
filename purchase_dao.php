<?php
    require_once 'purchase.php';
    
    // データベースを扱う便利屋さん
    class PurchaseDAO{
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
    
        // 購入履歴に1件登録するメソッド
        public static function insert($purchase){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（名前、年齢はわざとあやふやにしておく）
                $stmt = $pdo -> prepare("INSERT INTO purchases(customer_id, item_id, number) VALUES(:customer_id, :item_id, :number)");
                // バインド処理（あやふやだった箇所を実データで埋める）
                $stmt->bindParam(':customer_id', $purchase->customer_id, PDO::PARAM_INT);
                $stmt->bindParam(':item_id', $purchase->item_id, PDO::PARAM_INT);
                $stmt->bindParam(':number', $purchase->number, PDO::PARAM_INT);
                
                // INSERT文本番実行
                $stmt->execute();
    
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        
        // 顧客番号を指定した場合の購入情報を取得するメソッド
        public static function get_my_purchases($customer_id){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行する準備
                $stmt = $pdo -> prepare("SELECT * FROM purchases WHERE customer_id=:customer_id");
                // バインド処理（あやふやだった箇所を実データで埋める）
                $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
                
                // SELECT文本番実行
                $stmt->execute();
                
                // フェッチの結果を、Purchaseクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Purchase');
                
                // 全カート情報を取得
                $my_purchases = $stmt->fetchAll();
    
                return $my_purchases;
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        
        public static function get_total_price($purchases){
            $total = 0;
            foreach($purchases as $purchase){
                $total += $purchase->get_item()->price * $purchase->number;
            }
            return $total;
        }
        
    }