<?php
    // 外部ファイル読込
    require_once 'models/news_class.php';
    require_once 'daos/dao.php';
    // データベースを扱う便利屋さん
    class NewsDAO extends DAO{
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