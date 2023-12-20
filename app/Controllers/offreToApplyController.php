<?php
namespace App\Controllers;
use App\Models\offreToApplyModel;
use App\Controllers\PhpMailerSend;

class offreToApplyController{
    public static function getOffreToApply(){
        $listApplyOnline = offreToApplyModel::getOffreToApply(0);
        require(__DIR__ .'../../../view/admin/offreToApply.php');
    }
    public static function reponseApply($status,$id,$username,$email){
        $result=offreToApplyModel::reponseApply($id,$status);
        if($result['action']=="aprouve"){
            $message="<body class='bg-light'><div class='container'>
            <div style='display: flex; justify-content: center;'>
            <img class='ax-center my-10' style='width: 80px;' src='https://assets.bootstrapemail.com/logos/light/square.png' />
            </div><div class='card p-6 p-lg-10 space-y-4'><h1 class='h3 fw-700'>
            Job Offre </h1><p>
            Hello M.".$username." I am pleased to inform you that, as the administrator of <span style='font-weight: bold; color: red;'>Job Offre</span>, I accept the job 
            offer for the position of <span style='font-weight: bold; color: blue;'>".$result['title']."</span> at <span style='font-weight: bold; color: blue;'>".$result['entreprise']."</span>. I look forward to contributing to the team's success.
            </p><a class='btn btn-primary p-3 fw-700' href='https://app.bootstrapemail.com/templates'>Visit Website</a>
            </div></div></body>";
            $subject="Offre Resultat";
            PhpMailerSend::sendMail($email,$subject,$message);
        }else{
            $message="<body class='bg-light'><div class='container'>
            <div style='display: flex; justify-content: center;'>
            <img class='ax-center my-10' style='width: 80px;' src='https://assets.bootstrapemail.com/logos/light/square.png' />
            </div><div class='card p-6 p-lg-10 space-y-4'><h1 class='h3 fw-700'>
            Job Offre </h1><p>
            Dear M.".$username."
            I hope this message finds you well. I want to express my sincere appreciation for the opportunity to join <span style='font-weight: bold; color: blue;'>".$result['title']."</span>.
            After careful consideration, I regret to inform you that I must decline the job offer at this time. This decision was not made lightly, and I appreciate your understanding.
            Thank you once again for the offer, and I wish  <span style='font-weight: bold; color: blue;'>".$result['entreprise']."</span> continued success.
            Best regards,
            Admin
            </div></div></body>";
            $subject="Offre Resultat";
            $email=$_SESSION['emailUser'];
            PhpMailerSend::sendMail($email,$subject,$message);
        }
    }
    public static function userApplyOffre($idOffre){
        $idUser=$_SESSION['idUser'];
        $res = offreToApplyModel::userApplyOffre($idOffre,$idUser);
        if($res) echo "ok";
        else echo "non";
    }
}
?>
