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
    public static function searchOffre($id){
        $db = Database::getConnection();
        $stmt2=$db->prepare("SELECT * FROM applyonline NATURAL JOIN jobs WHERE ApplyOnlineID =?");
        $stmt2->execute([$id]);
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        return $result2;
    }
    public static function reponseApply($id,$status){
        $db = Database::getConnection();
        $jobInformation=offreToApplyModel::searchOffre($id);
        $idJob=$jobInformation[0]['jobID'];
        $title=$jobInformation[0]['title'];
        $entreprise=$jobInformation[0]['entreprise'];
        if($status==1){
            $stmt=$db->prepare("UPDATE applyonline SET Status=1, notification	=1 WHERE ApplyOnlineID=?");
            $stmt->execute([$id]);
            $result=JobModel::updateAprouve($idJob,1);
            return $collection = ['action'=>'aprouve','idJob'=>$idJob,'title'=>$title,'entreprise'=>$entreprise,];
        }else{
            $stmt=$db->prepare("DELETE  FROM applyonline WHERE ApplyOnlineID=?");
            $stmt->execute([$id]);
            return $collection = ['action'=>'decline','idJob'=>$idJob,'title'=>$title,'entreprise'=>$entreprise];
        }
    }
    public static function userApplyOffre($idOffre,$idUser){
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM applyonline WHERE userID=? AND jobID =?");
        $stmt->execute([$idUser,$idOffre]);
        $numRows = $stmt->rowCount();
        if($numRows==0) {
            $status=0;
            $stmt2=$db->prepare("INSERT INTO applyonline (userID,jobID,Status,notification) VALUE (?,?,?,?)");
            $notification=0;
            $result=$stmt2->execute([$idUser,$idOffre,$status,$notification]);
            if($result) return true;
        }
        else return false;
    }
}
?>
