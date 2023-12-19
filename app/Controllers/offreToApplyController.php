<?php
namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\offreToApplyModel;

class offreToApplyController{
    public static function getOffreToApply(){
        $listApplyOnline = offreToApplyModel::getOffreToApply(0);
        require(__DIR__ .'../../../view/admin/offreToApply.php');
    }
    public static function reponseApply($status,$id){
        $result=offreToApplyModel::reponseApply($id,$status);
        require 'phpmailer/src/Exception.php';
        require 'phpmailer/src/PHPMailer.php';
        require 'phpmailer/src/SMTP.php';
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth=true;
        $mail->Username = "rabieaitimghi7@gmail.com";
        $mail->Password = "zsywozvorccjxtbz";
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->setFrom('rabieaitimghi7@gmail.com');
        $mail->addAddress("speedfly2003@gmail.com");
        $mail->isHTML(true);
        $mail->Subject= "Resultat damand offre";
        $mail->Body = "
                <html>
                <body>
                    <h1>Resultat damand offre</h1>
                    <p>Congratulations! You got it.</p>
                </body>
                </html>
            ";
        $mail->send();
    }
}
?>
