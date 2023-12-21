<?php
namespace App\Controllers;
use App\Models\JobModel;
use App\Models\offreToApplyModel;
class OffreController{
    public static function getOffre(){
        $listJobs = JobModel::getOffre();
        $tempActiveTable=[0=>"In Active",1=>"Active"];
        $tempAprouveTable=[0=>"In Aprouve",1=>"Aprouve"];
        $collection=["listJobs"=>$listJobs,"tempActiveTable"=>$tempActiveTable,"tempAprouveTable"=>$tempAprouveTable];
        require(__DIR__ .'../../../view/admin/offre.php');
    }
    public static function addOffer($formData){
        extract($formData);
        $currentDateTime = date("Y_m_d_H_i_s");
        $targetDir = "assets/uploads/"; 
        $imageName=$currentDateTime. basename($_FILES["photo"]["name"]);
        $targetFile = $targetDir.$imageName;
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
            $result = JobModel::addOffer($title,$description,$entreprise,$location,$IsActive,$approve,$imageName);
            // if($result) OffreController::getOffre();
        } 
    }
    public static function deletOfre($idOffre){
        JobModel::deletOfre($idOffre);
        OffreController::getOffre();
    }
    public static function updateOffre($formData){
        extract($formData);
        JobModel::UpdateOffre($title,$description,$entreprise,$location,$IsActive,$approve,$id_Jobs);
    }
    public static function updateOffreDescriptio($descriptop){
        extract($descriptop);
        JobModel::updateOffreDescriptio($descriptDetail,$id_Jobs);
    }
    public static function searchOffre($searchValue,$searchType){
        $listjob=offreToApplyModel::SearchJob($searchValue,$searchType);
        require(__DIR__ .'../../../view/user/offreSearch.php');
    }
    public static function statistiqueOffre(){
        $statistique = JobModel::statistiqueOffre();
        return $statistique;
    }
    public static function offreDetail(){
        $listJobs = JobModel::getOffre();
        $tempActiveTable=[0=>"In Active",1=>"Active"];
        $tempAprouveTable=[0=>"In Aprouve",1=>"Aprouve"];
        $collection=["listJobs"=>$listJobs,"tempActiveTable"=>$tempActiveTable,"tempAprouveTable"=>$tempAprouveTable];
        require(__DIR__ .'../../../view/admin/offreDetail.php');
    }
}
?>
