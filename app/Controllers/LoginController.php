<?php
namespace App\Controllers;
use App\Models\LoginModel;
use App\Controllers\PhpMailerSend;
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
        if($_SESSION['roleUser']==1) return $acttion = 'home';
        if($_SESSION['roleUser']==2)  return $acttion = 'homeUser';

    }
    public static function registre() {
        require(__DIR__ .'../../../view/register.php');  
    }
    public static function emailVerfy() {
        require(__DIR__ .'../../../view/emailVerfy.php');  
    }
    public static function registerUser($dataForm){
        $generatedId = substr(uniqid(), 0, 8);
        $_SESSION['generateID']=$generatedId;
        extract($dataForm);
        $subject="Verfy Code";
        $message="<body class='bg-light'><div class='container'>
        <div style='display: flex; justify-content: center;'>
        <img class='ax-center my-10' style='width: 80px;' src='https://assets.bootstrapemail.com/logos/light/square.png' />
        </div><div class='card p-6 p-lg-10 space-y-4'><h1 class='h3 fw-700'>
        Verfy Code</h1><p>
        Thank you for registering with us. Your verification code is:
        <span style='color: red; font-size: 30px; font-weight: bold;'>".$generatedId."</span><br><br>
        Please use this code to complete the verification process. If you have any 
        questions or encounter any issues, feel free to contact our support team.
        </p><a class='btn btn-primary p-3 fw-700' href='https://app.bootstrapemail.com/templates'>Visit Website</a>
        </div></div></body>";
        PhpMailerSend::sendMail($email,$subject,$message);
        return "emailVerfy";
    }
    public static function verfyEmailRegistre($dataForm){
        $verfy=$dataForm['verfyEmail'];
        if($verfy==$_SESSION['generateID']){
            extract($_SESSION['tempPostRegister']);
            $roleuserID=2;
            $result=LoginModel::RegistreUserSucces($name,$email,$password,$roleuserID);
            if($result) return 'home';
        }else return 'emailVerfy';
    }
}
?>
