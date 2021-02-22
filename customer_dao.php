<?php
    require_once 'customer.php';
    
    // データベースを扱う便利屋さん
    class CustomerDAO{
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
    
        // // 全会員情報を取得するメソッド
        // public static function get_all_humans(){
        //     try{
        //         // データベースに接続する神様取得
        //         $pdo = self::get_connection();
        //         // SELECT文を実行する
        //         $stmt = $pdo->query('SELECT * FROM humans');
        //         // フェッチの結果を、Humanクラスのインスタンスにマッピングする
        //         $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Human');
        //         // 会員全データをHumanクラスのインスタンス配列で取得
        //         $humans = $stmt->fetchAll();
                
        //         // Humanクラスのインスタンスの配列を返す
        //         return $humans;
                
        //     }catch(PDOException $e){
        //         // とりあえず空の配列を返す
        //         return array();
            
        //     }finally{
        //         // 神様さようなら
        //         self::close_connection($pdo, $stmp);
        //     }
        // }
    
        // 会員を1件登録するメソッド
        public static function insert($customer){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（名前、年齢はわざとあやふやにしておく）
                $stmt = $pdo -> prepare("INSERT INTO customers (name, kana_name, postal_code, address, tel, email_address, password) VALUES (:name, :kana_name, :postal_code, :address, :tel, :email_address, :password)");
                // $name='', $kana_name='', $postal_code='', $address='', $tel='', $email_address='', $password=''
                // バインド処理（あやふやだった名前、年齢を実データで埋める）
                $stmt->bindParam(':name', $customer->name, PDO::PARAM_STR);
                $stmt->bindParam(':kana_name', $customer->kana_name, PDO::PARAM_STR);
                $stmt->bindParam(':postal_code', $customer->postal_code, PDO::PARAM_STR);
                $stmt->bindParam(':address', $customer->address, PDO::PARAM_STR);
                $stmt->bindParam(':tel', $customer->tel, PDO::PARAM_STR);
                $stmt->bindParam(':email_address', $customer->email_address, PDO::PARAM_STR);
                $stmt->bindParam(':password', $customer->password, PDO::PARAM_STR);
                
                // INSERT文本番実行
                $stmt->execute();
    
                return "会員登録が完了しました";
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        // メールアドレスとパスワードによって、お客様情報を取得する
        public static function get_customer($email_address, $password){
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行する準備（メールアドレス、パスワードはわざとあやふやにしておく）
                $stmt = $pdo -> prepare("SELECT * FROM customers WHERE email_address=:email_address AND password=:password");
                // バインド処理（あやふやだったメールアドレス、パスワードを実データで埋める）
                $stmt->bindParam(':email_address', $email_address, PDO::PARAM_STR);
                $stmt->bindParam(':password', $password, PDO::PARAM_STR);
                
                // SELECT文本番実行
                $stmt->execute();
                
                // フェッチの結果を、Customerクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Customer');
                // 顧客情報をCustomerクラスのインスタンスで取得
                $customer = $stmt->fetch();
    
                return $customer;
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        
        
    }