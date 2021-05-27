<?php
    // 外部ファイル読込
    require_once 'models/company.php';
    require_once 'daos/dao.php';
    // データベースを扱う便利屋さん
    class CompanyDAO extends DAO{
        // 企業情報を登録するメソッド
        public static function insert($company){
            $pdo = null;
            $stmp = null;
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // INSERT文を実行する準備（名前、年齢はわざとあやふやにしておく)
                $stmt = $pdo -> prepare("INSERT INTO companys (description, greeting, plan) VALUES (:description, :greeting, :plan)");
                
                // バインド処理（あやふやだった名前、年齢を実データで埋める）
                $stmt->bindParam(':description', $company->description, PDO::PARAM_STR);
                $stmt->bindParam(':greeting', $company->greeting, PDO::PARAM_STR);
                $stmt->bindParam(':plan', $company->plan, PDO::PARAM_STR);
                
                // INSERT文本番実行
                $stmt->execute();
    
                return "企業情報入力が完了しました";
                
            }catch(PDOException $e){
                
                return "問題が発生しました<br>" . $e->getMessage();
                
            }finally{
               self::close_connection($pdo, $stmp); 
            }
        }
        // 企業情報変更入力チェック
        public static function validate($company){
            // public $description;
            // public $greeting;
            // public $plan;
            // 空の配列
            $company_error = array();
            // KURIADELE入力チェック
            if($company->description === ''){
                $company_error[] = '入力に誤りがあります';
            }
            // 代表挨拶入力チェック
            if($company->greeting === ''){
                $company_error[] = '入力に誤りがあります';
            }
            // 事業計画入力チェック
            if($company->plan === ''){
                $company_error[] = '入力に誤りがあります';
            }
            return $company_error;
        }
        // 企業情報を取得するメソッド
        public static function get_companys_id($id){
            $pdo = null;
            $stmp = null;
            try{
                // データベースに接続する神様取得
                $pdo = self::get_connection();
                // SELECT文を実行
                $stmt = $pdo -> prepare('SELECT * FROM companys WHERE id = (SELECT max(id) FROM companys)');
                // バインド処理
                $stmt->bindParam(':id', $id , PDO::PARAM_INT);
                // 本番実行
                $stmt->execute();
                // フェッチの結果を、Companyクラスのインスタンスにマッピングする
                $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Company');
                
                // 登録企業情報を取得
                $company = $stmt->fetch();
                
                // 商品全部はいあげる
                return $company;
 
            }catch(PDOException $e){
                
                return null;
                
            }finally{
              self::close_connection($pdo, $stmp); 
            }
        }
        
        
    }
?>