<?php
namespace App\Models;
use PDO;
class JobModel {
    public static function getOffre() {
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM jobs ORDER BY jobID DESC");
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function addOffer($title,$description,$entreprise,$location,$IsActive,$approve,$imageName){
        $db = Database::getConnection();
        $stmt= $db->prepare("INSERT INTO jobs (title ,description, entreprise, location, IsActive, imageURL,approve)
        VALUE (?,?,?,?,?,?,?)");
        $stmt->execute([$title,$description,$entreprise,$location,$IsActive,$imageName,$approve]);
        return $stmt;
    }
    public static function deletOfre($idOffre){
        $db = Database::getConnection();
        $stmt=$db->prepare("DELETE FROM jobs WHERE jobID=?");
        $stmt->execute([$idOffre]);
        return $stmt;
    }
    public static function UpdateOffre($title,$description,$entreprise,$location,$IsActive,$approve,$id_Jobs){
        $db = Database::getConnection();
        $stmt=$db->prepare("UPDATE jobs SET title=?,
        description=?, entreprise=?, location=?, IsActive=?, approve=? WHERE jobID =?");
        $stmt->execute([$title,$description,$entreprise,$location,$IsActive,$approve,$id_Jobs]);
        return $stmt;
    }
    public static function updateAprouve($idOffer,$approve){
        $db = Database::getConnection();
        $stmt=$db->prepare("UPDATE jobs SET approve=? WHERE jobID =?");
        $stmt->execute([$approve,$idOffer]);
        return $stmt; 
    }
    
}
?>
