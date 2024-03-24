?php

namespace DB;


use PDOException;


class Database{
    private static $instance = null;
    private $connection;
    private $DB_HOST;
    private $DB_NAME;
    private $DB_USER;
    private $DB_PASSWORD;

        function __construct(){
            try{
                $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
                $dotenv->safeLoad();
                $this->DB_HOST     = $_ENV['DB_HOST'];
                $this->DB_NAME     = $_ENV['DB_NAME'];
                $this->DB_USER     = $_ENV['DB_USER'];
                $this->DB_PASSWORD = $_ENV['DB_PASSWORD'];
                $this->connection = new \PDO('mysql:dbname=' . $this->DB_NAME . ';host='.$this->DB_HOST.';', $this->DB_USER, $this->DB_PASSWORD);
                echo 'データベース接続開始';
            }catch(PDOException $e){
                echo 'データベース接続失敗:';
                echo $e->getMessage();               
            }
        }

        public static function getInstance(){
                if(self::$instance === null){
                    self::$instance = new Database();
                }
                return self::$instance;
        }
        
}