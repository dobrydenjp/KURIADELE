<?php
    // 外部ファイル読込
    require_once 'models/purchase.php';
    require_once 'daos/dao.php';
    // データベースを扱う便利屋さん
    class PurchaseDAO extends DAO{
        // 購入履歴に1件登録するメソッド
        public static function insert($purchase){
            $pdo = null;
            $stmp = null;
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
            $pdo = null;
            $stmp = null;
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
        // 全ての購入情報を取得するメソッド
        public static function get_all_purchases(){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文実行準備
                $stmt = $pdo -> query('SELECT * FROM purchases');
                // フェッチの結果をPurchasesクラスのインスタンスにマッピング
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Purchase');
                // 全商品情報取得
                $purchases = $stmt->fetchAll();
                // 返す
                return $purchases;
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
    }
?>