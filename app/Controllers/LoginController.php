<?php
namespace App\Controllers;
use App\Models\LoginModel;

class LoginController {
    public static function login() {
        require(__DIR__ .'../../../view/login.php');  
    }
    public static function loginUser($formData){
        extract($formData);
        $result=LoginModel::loginUser($email,$password);
        $_SESSION['idUser']=$result['userID'];
        $_SESSION['roleUser']=$result['roleuserID'];
        $_SESSION['emailUser']=$result['email'];
        $_SESSION['nameUser']=$result["username"];
        // $listJobs = Job::GetJobs(1);
        // $res1=job::JobCout();
        // $res2=job::JobCoutActiveInactive(1);
        // $res3=job::JobCoutActiveInactive(0);
        // $res4=job::Jobapprove(1);
        if($_SESSION['roleUser']==1) return $acttion = 'home';
        //  include_once 'view/admin/dashboard.php';
        if($_SESSION['roleUser']==2)  return $acttion = 'home';
        // include_once 'view/user/index.php';
    }
    public static function registre() {
        require(__DIR__ .'../../../view/register.php');  
    }
}
?>
