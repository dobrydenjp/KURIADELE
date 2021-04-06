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
    
        // 全会員情報を取得するメソッド
        public static function get_all_humans(){
            $pdo = null;
            $stmp = null;
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行する
                $stmt = $pdo->query('SELECT * FROM customers');
                // フェッチの結果を、Customerクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Customer');
                // 会員全データをCustomerクラスのインスタンス配列で取得
                $customers = $stmt->fetchAll();
                // Customerクラスのインスタンスの配列を返す
                return $customers;
                
            }catch(PDOException $e){
                
                
                // とりあえず空の配列を返す
                return array();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
    
        // 会員を1件登録するメソッド
        public static function insert($customer){
            $pdo = null;
            $stmp = null;
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
            $pdo = null;
            $stmp = null;
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
        
        // registration_new.phpへ送る
        // 入力値チェック
        public static function validate($customer){
            // Customer クラスのプロパティ
            // public $name;
            // public $kana_name;
            // public $postal_code;
            // public $address;
            // public $tel;
            // public $email_address;
            // public $password;
            // 空のエラー配列を準備
            $errors = array();
            
            // 名前のチェック
            if($customer->name === ''){
                $errors[] = 'お名前を入力してください';
            }
            // フリガナチェック
            if($customer->kana_name === ''){
                $errors[] = 'フリガナを入力してください';
            }
            // 郵便番号チェック
            if($customer->postal_code === ''){
                $errors[] = '郵便番号を入力してください';
            }else if(!preg_match('/^[0-9]{3}-[0-9]{4}$/', $customer->postal_code)){
                $errors[] = '郵便番号は所定の書式をお守りください';
            }
            // 住所チェック
            if($customer->address === ''){
                $errors[] = '住所を入力してください';
            }
            // 電話番号チェック
            if($customer->tel === ''){
                $errors[] = '電話番号を入力してください';
            }else if(!preg_match('/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/', $customer->tel)){
                $errors[] = '電話番号は所定の書式をお守りください';
            }
            // メールアドレスチェック
            if($customer->email_address === ''){
                $errors[] = 'メールアドレスを入力してください';
            }elseif(!preg_match('/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/', $customer->email_address)){
                $errors[] = 'メールアドレスは所定の書式をお守りください';
            }
            // パスワードチェック
            if(strlen($customer->password) < 5){
                $errors[] = 'パスワードは5文字以上で入力してください';
            }
            // k完成したエラー配列を返す registration_new.phpへ
            return $errors;
        }
        // メールアドレスとパスワードログイン入力値チェック
        public static function check($email_address, $password){
            // public $email_address;
            // public $password;
            // 空の配列用意
            // var_dump($customer->email_address);
            // var_dump($customer->password);
            $errors = array();
            // $customer->email_address === ''ならばエラーメッセージ表示する
            // メールアドレスチェック
            if($email_address === ''){
                $errors[] = 'メールアドレスを入力してください';
            }elseif(!preg_match('/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/', $email_address)){
                $errors[] = '登録メールアドレスを入力してください';
            }
            // パスワードチェック
            // 文字列か数値否か  文字strlen
            if($password === ''){
                $errors[] = 'パスワードは正しく入力してください'; 
            }
            return $errors;
            
        
        
        }
        // 登録されている会員情報を変更するメソッド
        public static function update($customer_update, $id){
            $pdo = null;
            $stmp = null;
            try{
                // var_dump($customer_update);
                // var_dump($login_customer);
                // データベースに接続する神様
                $pdo = self::get_connection();
                // update文を実行する準備（名前・カナ・郵便番号・住所・電話番号・メールアドレス・パスワードはあやふやにする）
                $stmt = $pdo->prepare('UPDATE customers SET name=:name, kana_name=:kana_name, postal_code=:postal_code, address=:address, tel=:tel, email_address=:email_address, password=:password WHERE id=:id');
                // バインド処理（あやふやだった名前・カナ・郵便番号・住所・電話番号・メールアドレス・パスワードを実データで埋める）
                $stmt->bindParam(':name', $customer_update->name, pdo::PARAM_STR);
                $stmt->bindParam(':kana_name', $customer_update->kana_name, pdo::PARAM_STR);
                $stmt->bindParam(':postal_code', $customer_update->postal_code, pdo::PARAM_INT);
                $stmt->bindParam(':address', $customer_update->address, pdo::PARAM_STR);
                $stmt->bindParam(':tel', $customer_update->tel, pdo::PARAM_INT);
                $stmt->bindParam(':email_address', $customer_update->email_address, pdo::PARAM_STR);
                $stmt->bindParam(':password', $customer_update->password, pdo::PARAM_STR);
                $stmt->bindParam(':id', $id, pdo::PARAM_INT);
                // print 'OK';

                // update本番実行
                $stmt->execute();
                // print 'OK';
                // return array($customer_update, $login_customer);
            
            }catch(PDOException $e){
                return'問題が発生しました';
            }finally{
                self::close_connection($pdo, $stmp);
            }
        }
    }
    // <!--既に登録している人の情報を変更-->
            
    //         <!--それをupdateで更新する-->
?>