<?php
    require_once 'cart.php';
    
    // データベースを扱う便利屋さん
    class CartDAO{
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
    
        // カートに1件登録するメソッド
        public static function insert($cart){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（名前、年齢はわざとあやふやにしておく）
                $stmt = $pdo -> prepare("INSERT INTO carts(customer_id, item_id, number) VALUES(:customer_id, :item_id, :number)");
                // バインド処理（あやふやだった箇所を実データで埋める）
                $stmt->bindParam(':customer_id', $cart->customer_id, PDO::PARAM_INT);
                $stmt->bindParam(':item_id', $cart->item_id, PDO::PARAM_INT);
                $stmt->bindParam(':number', $cart->number, PDO::PARAM_INT);
                
                // INSERT文本番実行
                $stmt->execute();
    
                return "カートに追加しました";
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        
        // 顧客番号を指定した場合の全カート情報を取得するメソッド
        public static function get_my_carts($customer_id){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行する準備
                $stmt = $pdo -> prepare("SELECT * FROM carts WHERE customer_id=:customer_id");
                // バインド処理（あやふやだった箇所を実データで埋める）
                $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
                
                // SELECT文本番実行
                $stmt->execute();
                
                // フェッチの結果を、Userクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Cart');
                
                // 全カート情報を取得
                $my_carts = $stmt->fetchAll();
    
                return $my_carts;
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        
        public static function get_total_price($carts){
            $total = 0;
            foreach($carts as $cart){
                $total += $cart->get_item()->price * $cart->number;
            }
            return $total;
        }
        
        
        // 指定した番号のカート情報を削除するメソッド
        public static function delete_cart($id){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // DELETE文を実行する準備
                $stmt = $pdo -> prepare("DELETE FROM carts WHERE id=:id");
                // バインド処理（あやふやだった箇所を実データで埋める）
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                
                // DELETE文本番実行
                $stmt->execute();
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }

        
    }