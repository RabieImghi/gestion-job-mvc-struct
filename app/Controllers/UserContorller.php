<?php
namespace App\Controllers;
use App\Models\UserModel;

class UserContorller{
    public static function index(){
        $listjob = UserModel::getOffreList(3);
        require(__DIR__ .'../../../view/user/index.php'); 
    }
    
    
}
?>
