<?php
if(isset($_SESSION['roleUser'])){
    if($_SESSION['roleUser']==2) header('location: index.php?route=home');
ob_start();
$offre="active";
echo $collection['listJobs'][0]['descriprtionDetail'];
?>

<?php
$content=ob_get_clean();
include 'header.php';
}else{
    header('location: index.php?route=home');
}
?>
