<?php
if(isset($_SESSION['roleUser'])){
    if($_SESSION['roleUser']==2) header('location: index.php?route=home');
$home="active";
ob_start();
?>
tttt
<?php
$content=ob_get_clean();
include 'header.php';
}else{
    header('location: index.php?route=home');
}
?>