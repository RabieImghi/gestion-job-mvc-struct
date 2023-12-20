<?php
namespace App\Controllers;
use App\Models\UserModel;

class UserContorller{
    public static function index(){
        require(__DIR__ .'../../../view/user/html/index.php'); 
    }
    
    
}
?>
