<?php
    // 外部ファイル読込
    require_once 'models/admin.php';
    require_once 'models/bank.php';
    require_once 'daos/dao.php';
    // 企業情報変更についてのＤＡＯ
    class AdminDAO extends DAO{
        // 管理者登録メソッド
        public static function admin_insert($admin){
            $pdo = null;
            $stmp = null;
            try{
            // データベースに接続する神様取得
            $pdo = self::get_connection();
            // INSERT文を実行する準備（名前、年齢はわざとあやふやにしておく）
            $stmt = $pdo -> prepare("INSERT INTO admins (name, email_address, password) VALUES (:name, :email_address, :password)");
            // バインド処理（あやふやだった名前、年齢を実データで埋める）
            $stmt->bindParam(':name', $admin->name, PDO::PARAM_STR);
            $stmt->bindParam(':email_address', $admin->email_address, PDO::PARAM_INT);
            $stmt->bindParam(':password', $admin->password, PDO::PARAM_INT);
            // INSERT文本番実行
            $stmt->execute();
            
            return '管理者登録が完了しました';
            
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
            
        }
        
        // 管理者登録 入力チェック
        public static function validate_sign_up($admin){
            $pdo = null;
            $stmp = null;
            // public $name;
            // public $email_address;
            // public $password;
            $error_message = array();
            // 銀行名を入力しない場合のメッセージ
            if($admin->name === ''){
                $error_message[] = 'お名前を入力してください';
            }
            // 支店名を入力しない場合のメッセージ
            if($admin->email_address === ''){
                $error_message[] = 'メールアドレスを入力してください';
            }elseif(!preg_match('/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/', $admin->email_address)){
                $error_message[] = 'メールアドレスは所定の書式をお守りください';
            }
            // 預金科目を入力しない場合のメッセージ
            if(strlen($admin->password) < 5){
                $error_message[] = 'パスワードは5文字以上で入力してください';
            }
            return $error_message;
        }
        
        
        // メールアドレスとパスワードによって、管理者情報を取得する
        public static function get_admin($email_address, $password){
            $pdo = null;
            $stmp = null;
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
        // 管理者 銀行口座を1件登録するメソッド
        public static function insert($bank){
            $pdo = null;
            $stmp = null;
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（名前、年齢はわざとあやふやにしておく）
                $stmt = $pdo -> prepare("INSERT INTO bank (bank_name, branch_name, account, NO, kana_name) VALUES (:bank_name, :branch_name, :account, :NO, :kana_name)");
                // バインド処理（あやふやだった名前、年齢を実データで埋める）
                $stmt->bindParam(':bank_name', $bank->bank_name, PDO::PARAM_STR);
                $stmt->bindParam(':branch_name', $bank->branch_name, PDO::PARAM_STR);
                $stmt->bindParam(':account', $bank->account, PDO::PARAM_STR);
                $stmt->bindParam(':NO', $bank->NO, PDO::PARAM_INT);
                $stmt->bindParam(':kana_name', $bank->kana_name, PDO::PARAM_STR);
                // INSERT文本番実行
                $stmt->execute();
                return '銀行口座を登録しました';

            }catch(PDOException $e){

                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
                self::close_connection($pdo, $stmp);
            }
        }
        // idによって管理者の口座情報を取得するメソッド
        public static function get_bank_by_id($id){
            $pdo = null;
            $stmp = null;
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行する あいまいなまま準備する
                $stmt = $pdo->prepare('SELECT * FROM bank WHERE id = (SELECT max(id) FROM bank)');
                // バインド処理
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                // 本番実行
                $stmt->execute();
                // フェッチの結果を、Bankクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Bank');
                // 商品情報をBankクラスのインスタンスで取得
                $bank = $stmt->fetch();
                
                // Bankクラスのインスタンスを返す
                return $bank;
                
            }catch(PDOException $e){
                // とりあえずnullの配列を返す
                return null;
            
            }finally{
                // 神様さようなら
                self::close_connection($pdo, $stmp);
            }
        }
        
        // 入力エラーチェック
        public static function validate($bank){
            // public $bank_name;
            // public $branch_name;
            // public $account;
            // public $NO;
            // public $kana_name;
            // 空の配列準備
            $error_message = array();
            // 銀行名を入力しない場合のメッセージ
            if($bank->bank_name === ''){
                $error_message[] = '銀行名を入力してください';
            }
            // 支店名を入力しない場合のメッセージ
            if($bank->branch_name === ''){
                $error_message[] = '支店名を入力してください';
            }
            // 預金科目を入力しない場合のメッセージ
            if($bank->account === ''){
                $error_message[] = '預金科目を入力してください';
            }
            // 口座番号を入力しない場合のメッセージ
            if($bank->NO === ''){
                $error_message[] = '番号を入力してください';
            }elseif(!preg_match('/^[0-9]+$/', $bank->NO)){
                $error_message[] = '正しい番号を入力してください';
            }
            // 口座名義を入力しない場合のメッセージ
            //片仮名入力チェック
            if(!preg_match('/^[ｦ-ﾟｰ ]+$/u', $bank->kana_name)){
                $error_message[] = '半角カタカナを入力してください';
            }
            return $error_message;
        }
    }
?>