<?php
    // 外部ファイル読込
    require_once 'news_class.php';
    // データベースを扱う便利屋さん
    class NewsDAO{
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
        // KURIADELEnewsを登録するメソッド
        public static function insert($news){
            $pdo = null;
            $stmp = null;
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（名前、年齢はわざとあやふやにしておく)
                $stmt = $pdo -> prepare("INSERT INTO news (days, news) VALUES (:days, :news)");
                
                // バインド処理（あやふやだった名前、年齢を実データで埋める）
                $stmt->bindParam(':days', $news->days, PDO::PARAM_STR);
                $stmt->bindParam(':news', $news->news, PDO::PARAM_STR);
                
                // INSERT文本番実行
                $stmt->execute();
    
                return "newsが登録完了しました";
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        
        // エラーチェック
        public static function validate($news){
            // public $days;
            // public $news;
            // 空の配列準備
            $news_error = array();
            
            // 日付入力エラーがある場合のメッセージ
            if($news->days == ''){
                $news_error[] = '日付に誤りがあります';
            }
            // news入力エラーがある場合のメッセージ
            if($news->news == ''){
                $news_error[] = 'newsの入力誤りがあります';
            }
            return $news_error;
        }
        
        // 最新の入力idを出力するメソッド
        public static function get_news_id($id){
            $pdo = null;
            $stmp = null;
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行
                $stmt = $pdo -> prepare('SELECT * FROM news WHERE id = (SELECT max(id) FROM news)');
                // バインド処理
                $stmt->bindParam(':id', $id , PDO::PARAM_INT);
                // 本番実行
                $stmt->execute();
                // フェッチの結果を、Newsクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'News');
                
                // 登録企業情報を取得
                $news = $stmt->fetch();
                
                // 企業情報はいあげる
                return $news;
 
            }catch(PDOException $e){
                
                return null;
                
            }finally{
              self::close_connection($pdo, $stmp); 
            }
        }
    }
?>