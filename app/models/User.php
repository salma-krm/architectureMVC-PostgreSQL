<?php 
namespace app\models;
use app\core\Database;
class User{
    private $firstname;
    private $lastname;
    private $email;
    private $password;

    public function __construct( ) {}
    public function create(){
        $query = "INSERT INTO User (firstname , lastname, email, password) 
              VALUES (:firstname, :lastname, :email, :password)";
         $stmt = Database::getInstance()->getConnection()->prepare($query);
         $stmt->bindParam(':firstname', $this->firstname);
         $stmt->bindParam(':lastname', $this->lastname);
         $stmt->bindParam(':email', $this->email);
         $stmt->bindParam(':password', $this->password);
         $stmt->bindParam(':id_role', $roleId);
         return $stmt->execute();

    }
}
?>