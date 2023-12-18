<?php
namespace App\Controllers;
use App\Models\JobModel;
class OffreController{
    public static function getOffre(){
        $listJobs = JobModel::getOffre();
        $tempActiveTable=[0=>"In Active",1=>"Active"];
        $tempAprouveTable=[0=>"In Aprouve",1=>"Aprouve"];
        $collection=["listJobs"=>$listJobs,"tempActiveTable"=>$tempActiveTable,"tempAprouveTable"=>$tempAprouveTable];
        require(__DIR__ .'../../../view/admin/offre.php');
    }
}
?>
