<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
if(isset($_GET['tet'])){
    echo $_POST['testsss'];
    die();
}
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\AdminContorller;
use App\Controllers\OffreController;
use App\Controllers\offreToApplyController;
use App\Controllers\UserContorller;
$route = isset($_GET['route']) ? $_GET['route'] : 'home';
if(isset($_POST["submit"])){
    $submit = $_POST['submit'];
    switch($submit){
        //User 
        case 'log_out': session_destroy(); break;
        case 'loginUser': $route = LoginController::loginUser($_POST);break;
        case 'registerUser':$_SESSION['tempPostRegister']=$_POST; $route=LoginController::registerUser($_POST);break;
        case 'verfyEmailRegistre':$route=LoginController::verfyEmailRegistre($_POST);break;
        case 'updateUser': AdminContorller::updateCandidat($_POST);break;
        
        //Crud Offre
        case 'addOfferCrud': OffreController::addOffer($_POST);break;
        case 'updateOffre': OffreController::updateOffre($_POST);break;
        case 'updateOffreDescriptio': OffreController::updateOffreDescriptio($_POST);break;

        //applu online
        
        case "aprouve" : offreToApplyController::reponseApply(1,$_POST['idOffer'],$_POST['username'],$_POST['email']); break;
        case "decline" : offreToApplyController::reponseApply(2,$_POST['idOffer'],$_POST['username'],$_POST['email']); break;  
    }
}
switch ($route) {
    //login
    case 'pageVide':''; break;
    case 'login': LoginController::login(); break;
    case 'registre':   LoginController::registre(); break;
    case 'emailVerfy': LoginController::emailVerfy(); break;
    case 'log_out': session_destroy(); AdminContorller::index(); break;
    //User Crud
    case 'homeUser':     UserContorller::index(); break;
    case 'allOffre':     UserContorller::allOffre(); break;
    case 'searchJob':     OffreController::searchOffre($_GET['value'],$_GET['type']); break;
    case 'home':     AdminContorller::index(); break;
    case 'candidat': AdminContorller::getCandidat(); break;
    case 'deletCondidat': AdminContorller::deletCondidat($_GET['deletCondidat']);  break;

    //Crud Offre
    case 'offre': OffreController::getOffre();  break;
    case 'deletOfre': OffreController::deletOfre($_GET['deletOfre']);  break;
    case 'offreDetail': OffreController::offreDetail();  break;
    
    //Crude offreToApply
    case 'offreToApply': offreToApplyController::getOffreToApply();break;
    case 'userApplyOffre':offreToApplyController::userApplyOffre($_GET['idOffre']);break;
    default:
        header('HTTP/1.0 404 Not Found');
        AdminContorller::errorPage();
        exit('Page not found');
}

?>
