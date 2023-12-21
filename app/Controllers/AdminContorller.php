<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\UserContorller;
use App\Controllers\OffreController;
class AdminContorller{
    public static function index(){
        if(isset($_SESSION['roleUser'])){
            if($_SESSION['roleUser']==1) {
                $statistique=OffreController::statistiqueOffre();
                require(__DIR__ .'../../../view/admin/index.php');   
            }
            if($_SESSION['roleUser']==2) {
                UserContorller::index();
            } 
        }else{
            UserContorller::index();
            require(__DIR__ .'../../../view/user/index.php'); 
        }
        
    }
    public static function getCandidat(){
        $listUsers = UserModel::getAllCandidat();
        $RoleUsers = UserModel::GetRoles();
        $collections = ['listUsers' => $listUsers , "RoleUsers" => $RoleUsers] ;
        require(__DIR__ .'../../../view/admin/candidat.php');
    }
    public static function updateCandidat($formData){
        extract($formData);
        $result=UserModel::updateCandidat($name,$email,$roleuserID,$id_user);
    }
    public static function deletCondidat($idCondidate){
        $result = UserModel::deletCondidat($idCondidate);
        if($result){
            $listUsers = UserModel::getAllCandidat();
            $RoleUsers = UserModel::GetRoles();
            return $collections = ['listUsers' => $listUsers , "RoleUsers" => $RoleUsers] ;
        } 
    }
    public static function errorPage(){
        require(__DIR__.'../../../view/user/404-modern.html');
    }
}
?>
