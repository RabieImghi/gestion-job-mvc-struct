<?php
namespace App\Models;
use PDO;
class JobModel {
    public static function getOffre() {
        $db = Database::getConnection();
        $stmt=$db->prepare("SELECT * FROM jobs");
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
