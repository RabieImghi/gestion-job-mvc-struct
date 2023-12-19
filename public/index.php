<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\AdminContorller;
use App\Controllers\OffreController;
use App\Controllers\offreToApplyController;


$route = isset($_GET['route']) ? $_GET['route'] : 'home';
if(isset($_POST["submit"])){
    $submit = $_POST['submit'];
    switch($submit){
        //User 
        case 'loginUser': $route = LoginController::loginUser($_POST);break;
        case 'updateUser': AdminContorller::updateCandidat($_POST);break;
        //Crud Offre
        case 'addOfferCrud': OffreController::addOffer($_POST);break;
        case 'updateOffre': OffreController::updateOffre($_POST);break;
        //applu online
        case "aprouve" : offreToApplyController::reponseApply(1,$_POST['idOffer'],$_POST['username'],$_POST['email']); break;
        case "decline" : offreToApplyController::reponseApply(2,$_POST['idOffer'],$_POST['username'],$_POST['email']); break;  
    }
}
switch ($route) {
    //login
    case 'login': LoginController::login(); break;
    case 'registre': LoginController::registre(); break;
    
    //User Crud
    case 'home':     AdminContorller::index(); break;
    case 'candidat': AdminContorller::getCandidat(); break;
    case 'deletCondidat': AdminContorller::deletCondidat($_GET['deletCondidat']);  break;

    //Crud Offre
    case 'offre': OffreController::getOffre();  break;
    case 'deletOfre': OffreController::deletOfre($_GET['deletOfre']);  break;

    //Crude offreToApply
    case 'offreToApply': offreToApplyController::getOffreToApply();break;
    
    
    
    default:
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

?>
