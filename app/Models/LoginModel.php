<?php
namespace App\Models;
use PDO;
class LoginModel {
    public static function loginUser($email,$password) {
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM users WHERE email=? AND passwordHash=?");
        $newPassHash=MD5($password);
        $result=$stmt->execute([$email,$newPassHash]);
        $numRows = $stmt->rowCount();
        if($result && $numRows>0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
    }
    
}
?>
