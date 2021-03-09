<?php
    require_once 'item.php';
    
    // データベースを扱う便利屋さん
    class ItemDAO{
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
    
    
        // 商品を1件登録するメソッド
        public static function insert($item){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（データはわざとあやふやにしておく）
                $stmt = $pdo -> prepare("INSERT INTO items (name, image, price, stock, description) VALUES(:name, :image, :price, :stock, :description)");
                
                // バインド処理（あやふやだった箇所実データで埋める）
                $stmt->bindParam(':name', $item->name, PDO::PARAM_STR);
                $stmt->bindParam(':image', $item->image, PDO::PARAM_STR);
                $stmt->bindParam(':price', $item->price, PDO::PARAM_INT);
                $stmt->bindParam(':stock', $item->stock, PDO::PARAM_INT);
                $stmt->bindParam(':description', $item->description, PDO::PARAM_STR);
                
                // INSERT文本番実行
                $stmt->execute();
    
                return "新規商品の登録が完了しました";
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        
        // ファイルをアップロード
        public static function upload(){
            // ファイルを選択していれば
            if (!empty($_FILES['image']['name'])) {
                // ファイル名をユニーク化
                $prefix = uniqid(mt_rand(), true); 
                // アップロードされたファイルの拡張子を取得
                $image = $prefix . '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);
    
                $file = 'upload/items/' . $image;
    
                // uploadディレクトリにファイル保存
                move_uploaded_file($_FILES['image']['tmp_name'], $file);
                
                return $image;
                
            }else{
                return null;
            }
        }
        // 全ての商品を取得するメソッド
        public static function get_all_items(){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行
                $stmt = $pdo -> query("SELECT * FROM items");
                
                // フェッチの結果を、Userクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Item');
                
                // 全商品情報を取得
                $items = $stmt->fetchAll();
                
                // 商品全部はいあげる
                return $items;
 
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        
        //idから1つの商品を取得する
        public static function get_item_by_id($id){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行する あいまいなまま準備する
                $stmt = $pdo->prepare('SELECT * FROM items WHERE id=:id');
                // バインド処理
                $stmt->bindParam(':id', $id , PDO::PARAM_INT);
                // 本番実行
                $stmt->execute();
                // フェッチの結果を、Itemクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Item');
                // 商品情報をItemクラスのインスタンスで取得
                $item = $stmt->fetch();
                
                // Itemクラスのインスタンスを返す
                return $item;
                
            }catch(PDOException $e){
                // とりあえずnullの配列を返す
                return null;
            
            }finally{
                // 神様さようなら
                self::close_connection($pdo, $stmp);
            }
        }
        
        // 購入時該当商品の在庫を 減らす
        public static function decrement_stock($cart){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（データはわざとあやふやにしておく）
                $stmt = $pdo -> prepare("UPDATE items SET stock=(stock - :number) WHERE id=:id");
                
                // バインド処理（あやふやだった箇所実データで埋める）
                $stmt->bindParam(':number', $cart->number, PDO::PARAM_INT);
                $stmt->bindParam(':id', $cart->item_id, PDO::PARAM_INT);
                
                // UPDATE文本番実行
                $stmt->execute();
    
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        } 
        
        public static function validate($item){
        //         // public $name;
        //         // public $image;
        //         // public $price;
        //         // public $stock;
        //         // public $description;
                
            // 空の配列
            $errors = array();
            // 名前を入力しない場合のメッセージ
            if($item->name === ''){
                $errors[] = '商品名を入力してください';
            }
            // 写真を選択しない場合のメッセージ
            if($item->image === ''){
                $errors[] = '写真を選択してください';
            }
            // 価格を入力しない場合のメッセージ
            if($item->price === ''){
                $errors[] = '金額を入力してください';
                // 金額(３桁毎のカンマ付、小数以下無し、符号無し)にしたい
                // ^((([1-9]\d*)(,\d{3})*)|0)
            }elseif(!preg_match('/^[0-9]+$/', $item->price)){
                $errors[] = '正しい金額を入力してください';
            }
            // 個数を入力しない場合のメッセージ
            if($item->stock === ''){
                $errors[] = '個数を入力してください';
            }elseif(!preg_match('/^[0-9]+$/', $item->stock)){
                $errors[] = '正しい数字を入力してください';
            }
            // 説明文を入力しない場合のメッセージ
            if($item->description === ''){
                $errors[] = '説明文を入力してください';
            }
            
            return $errors;
            
        }
    }
?>