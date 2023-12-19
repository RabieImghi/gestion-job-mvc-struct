<?php
namespace App\Models;
use PDO;
use App\Models\JobModel;
class offreToApplyModel {
    public static function getOffreToApply($status){
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM users NATURAL JOIN applyonline NATURAL JOIN jobs WHERE Status=?");
        $stmt->execute([$status]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public static function reponseApply($id,$status){
        $db = Database::getConnection();
        if($status==1){
            $stmt=$db->prepare("UPDATE applyonline SET Status=1, notification	=1 WHERE ApplyOnlineID=?");
            $stmt->execute([$id]);
            $stmt2=$db->prepare("SELECT * FROM applyonline WHERE ApplyOnlineID =?");
            $stmt2->execute([$id]);
            $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            $idJob=$result2[0]['jobID'];
            $result=JobModel::updateAprouve($idJob,1);
        }else{
            $stmt=$db->prepare("DELETE  FROM applyonline WHERE ApplyOnlineID=?");
            $stmt->execute([$id]);
        }
        return true;
    }
}
?>
