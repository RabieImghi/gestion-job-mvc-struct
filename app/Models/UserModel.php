<?php
namespace App\Models;
use PDO;
class UserModel {
    public static function getAllCandidat() {
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM users");
        $stmt->execute();
        $users=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    public static function GetRoles(){
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM roleusers");
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function updateCandidat($name,$email,$roleuserID,$id_user){
        $db = Database::getConnection();
        $stmt=$db->prepare("UPDATE users SET username=?, email=?, roleuserID=? WHERE userID =?");
        $result=$stmt->execute([$name,$email,$roleuserID,$id_user]);
        if($result) return true;
    }
    public static function deletCondidat($idCondidate){
        $db = Database::getConnection();
        $stmt=$db->prepare("DELETE FROM users WHERE userID =?");
        $result=$stmt->execute([$idCondidate]);
        if($result) return true;
    }
}
?>
