<?php
namespace App\Controllers;
use App\Models\UserModel;

class AdminContorller{
    public static function index(){
        require(__DIR__ .'../../../view/admin/index.php'); 
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
        if($result){
            $listUsers = UserModel::getAllCandidat();
            $RoleUsers = UserModel::GetRoles();
            return $collections = ['listUsers' => $listUsers , "RoleUsers" => $RoleUsers] ;
        } 
    }
    public static function deletCondidat($idCondidate){
        $result = UserModel::deletCondidat($idCondidate);
        if($result){
            $listUsers = UserModel::getAllCandidat();
            $RoleUsers = UserModel::GetRoles();
            return $collections = ['listUsers' => $listUsers , "RoleUsers" => $RoleUsers] ;
        } 
    }
    
}
?>
