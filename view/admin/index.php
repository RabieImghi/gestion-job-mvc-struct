<?php
$home="active";
ob_start();
echo $_SESSION['roleUser']."<br>";
echo $_SESSION['emailUser']."<br>";
echo $_SESSION['nameUser']."<br>";
?>
tttt
<?php
$content=ob_get_clean();
include 'header.php';
?>