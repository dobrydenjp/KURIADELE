<?php
    // 外部ファイル読込
    require_once 'models/contact.php';
    require_once 'daos/dao.php';
    // データベースを扱う便利屋さん
    class ContactDAO extends DAO{
        // 問い合わせ内容を1件登録するメソッド
        public static function insert($contacts){
            $pdo = null;
            $stmp = null;
            try{
                // print 'OK';
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // print 'OK1';
                // INSERT文を実行する準備（データはわざとあやふやにしておく）
                $stmt = $pdo -> prepare("INSERT INTO contacts (name, subject, contact, email_address) VALUES(:name, :subject, :contact, :email_address)");
                // print 'OK2';
                // バインド処理（あやふやだった箇所実データで埋める）
                $stmt->bindParam(':name', $contacts->name, PDO::PARAM_STR);
                $stmt->bindParam(':subject', $contacts->subject, PDO::PARAM_STR);
                $stmt->bindParam(':contact', $contacts->contact, PDO::PARAM_STR);
                $stmt->bindParam(':email_address', $contacts->email_address, PDO::PARAM_STR);
                // print 'OK3';
                // INSERT文本番実行
                $stmt->execute();
                // print 'OK4';
                return 'ご質問ありがとうございます。ご返信にはお時間を頂きます。よろしくお願い致します。';
            
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
                self::close_connection($pdo, $stmp);
            }
        }
        // 入力チェック
        public static function validate($contacts){
            // public $name;
            // public $subject;
            // public $contact;
            // public $email_address;
            // 空の配列準備
            $contact_error = array();
            // 名前入力していない場合のメッセージ
            if($contacts->name === ''){
                $contact_error[] = 'お名前を入力してください';
                // var_dump($contact_error);
            }
            // 件名入力していない場合のメッセージ
            if($contacts->subject === ''){
                $contact_error[] = '件名を入力してください';
            }
            // 内容入力していない場合のメッセージ
            if($contacts->contact === ''){
                $contact_error[] = '内容を入力してください';
            }
            // メールアドレス入力していない場合のメッセージ
            if($contacts->email_address === ''){
                $contact_error[] = '返信用メールアドレスを入力してください';
            }elseif(!preg_match('/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/', $contacts->email_address)){
                $contact_error[] = 'メールアドレスは所定の書式をお守りください';
            }
            
            return $contact_error;
        }
        
        // 問い合わせ内容を全件取得するメソッド
        public static function get_all_contacts(){
            $pdo = null;
            $stmp = null;
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行
                $stmt = $pdo -> query('SELECT * FROM contacts');
                
                // フェッチの結果を、Contactクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Contact');
                
                // 全問合せ情報を取得
                $contacts = $stmt->fetchAll();
                
                // 問合せ内容全部はいあげる
                return $contacts;
 
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        // idから問合せ内容を取得する
        public static function get_contact_id($id){
            $pdo = null;
            $stmp = null;
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文実行
                $stmt = $pdo -> prepare('SELECT * FROM contacts WHERE id=:id');
                // バインド処理
                $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
                // 本番実行
                $stmt -> execute();
                // フェッチの結果をContactクラスのインスタンスにマッピングする
                $stmt -> setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Contact');
                // idの情報取得
                $contact = $stmt->fetch();
                // id情報　返す
                return $contact;
                
            }catch(PDOExeption $e){
                
                return null;
                
            }finally{
                self::close_connection($pdo, $stmp);
            }
            
            
        }
    }
?>