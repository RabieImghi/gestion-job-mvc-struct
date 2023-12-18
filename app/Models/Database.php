<?php
namespace App\Models;
require_once __DIR__ . '../../../config/Config.php';

use PDO;

class Database{
    public static function getConnection(){
        return new PDO("mysql:host=localhost;dbname=gestionoffer","root", "");
    }
}
?>
