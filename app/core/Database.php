<?php
namespace app\core;
use PDOException;
use PDO;
class Database{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = 12345;
    private static $dbname = "Architecturemvc";
    private static $port = 5432;
    private static $connexion;
    private static $instance;

    function __construct(){
        if (!self::$connexion) {
            try {
               
                self::$connexion = new PDO(
                    "pgsql:host=" . self::$servername . ";dbname=" . self::$dbname . ";port=" . self::$port,
                    self::$username,
                    self::$password
                );
                
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo 'Hi  ';  
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        
    }

    public static function getInstance() {
        if(!self::$instance){
            self::$instance = new Database();
            
            
        }
            return self::$instance ;
        }
        
        public function getConnection(){
            return self::$connexion;
        }



       
}
$conn= new Database();



?>